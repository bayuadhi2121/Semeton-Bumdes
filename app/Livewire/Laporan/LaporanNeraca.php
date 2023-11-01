<?php

namespace App\Livewire\Laporan;

use App\Models\JurnalUmum;
use App\Models\Modal;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanNeraca extends Component
{
    public $akunKas, $piutang, $komputer, $perlengkapan, $umum, $barangdagang; //variabel asset lancar
    public $gedung, $tanah, $kendaraan, $penyusutan, $assettetap; //variabel asset tak lancar
    public $assetlain; //variabel asset lain
    public $hutangUsaha, $gaji, $pihakk3jkpendek, $jkpendeklain, $listrik, $telpon, $sewagedung;
    public $bank, $modal, $hasil, $pihak3, $pajak, $modalakhir;
    #[Layout('layouts.laporan')]
    public $awal, $akhir;

    public $modalAwal;
    public function mount($awal, $akhir)
    {
        $this->setValue();
        $this->awal =  Carbon::parse($awal)->startOfDay();
        $this->akhir = Carbon::parse($akhir)->endOfDay();
    }

    public function render()
    {
        return view('livewire.laporan.laporan-neraca');
    }

    public function setUsaha()
    {
        $this->akunKas = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Kas%')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        $this->hutangUsaha = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Hutang%')
            ->whereNotNull('akuns.id_usaha')
            ->first();
        $this->modalakhir = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Modal Akhir%')
            ->whereNotNull('akuns.id_usaha')
            ->first();
    }
    public function queryKas($keyword, $propertyName)
    {
        $propertyValue = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%' . $keyword . '%')
            ->first();

        $this->$propertyName = $propertyValue;
    }
    public function queryHutang($keyword, $propertyName)
    {
        $propertyValue = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%' . $keyword . '%')
            ->whereNotNull('akuns.id_usaha')
            ->first();

        $this->$propertyName = $propertyValue;
    }
    public function modal($propertyName)
    {
        $propertyValue = Modal::where('tahun', $this->awal->year - 1)
            ->first();

        $this->$propertyName = $propertyValue;
    }

    public function setValue()
    {
        $this->setUsaha();
        $this->queryKas('Piutang', 'piutang');
        $this->queryKas('Umum', 'umum');
        $this->queryKas('Komputer', 'komputer');
        $this->queryKas('Tanah', 'tanah');
        $this->queryKas('Gedung dan Bangunan', 'gedung');
        $this->queryKas('Kendaraan', 'kendaraan');
        $this->queryKas('Penyusutan', 'penyusutan');
        $this->queryKas('Aset Tetap', 'asettetap');
        $this->queryKas('Perlengkapan', 'perlengkapan');
        $this->queryKas('Aset Lain', 'assetlain');
        $this->queryKas('Barang Dagang', 'barangdagang');
        $this->queryHutang('Gaji dan Tunjangan', 'gaji');
        $this->queryHutang('Pihak Ketiga Jk. Pendek', 'pihakk3jkpendek');
        $this->queryHutang('Jangka Pendek Lainnya', 'jkpendeklain');
        $this->queryHutang('Sewa Gedung', 'jkpendeklain');
        $this->queryHutang('Listrik', 'listrik');
        $this->queryHutang('Telfon', 'telpon');
        $this->queryHutang('Bank', 'bank');
        $this->queryHutang('Modal', 'modal');
        $this->queryHutang('Hasil', 'hasil');
        $this->queryHutang('Kepada Pihak Ketiga', 'pihak3');
        $this->queryHutang('Pajak', 'pajak');

        $this->modal('modalAwal');
    }
}
