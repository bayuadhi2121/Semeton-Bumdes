<?php

namespace App\Livewire\Laporan;

use App\Models\JurnalUmum;
use App\Models\Modal;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanModal extends Component
{
    public $jasa, $dagang, $beban;
    public $bank, $hasil, $sumbangan;
    public $bunga, $denda, $administrasi, $lain;

    public $totaljasa = 0, $totaldagang = 0, $totalbeban = 0;
    public $labakotor;
    public $lababersih;

    public $modalAwal;

    public $prive;
    public $awal, $akhir;
    public function mount($awal, $akhir)
    {
        $this->awal =  Carbon::parse($awal)->startOfDay();
        $this->akhir = Carbon::parse($akhir)->endOfDay();;
    }

    #[Layout('layouts.laporan')]
    public function render()
    {
        $this->setLaba();
        dd($this->awal);
        return view('livewire.laporan.laporan-modal');
    }
    public function setLaba()
    {
        $this->jasa = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Kas%')
            ->where('usahas.status', 'Jasa')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        $this->dagang =
            JurnalUmum::join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'usahas.id_usaha', '=', 'transaksis.id_usaha')
            ->join('jual_belis', 'transaksis.id_transaksi', '=', 'jual_belis.id_transaksi')
            ->join('jbdagangs', 'jual_belis.id_jualbeli', '=', 'jbdagangs.id_jualbeli')
            ->join('barangs', 'barangs.id_barang', '=', 'jbdagangs.id_barang')
            ->select('usahas.nama')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Penjualan%" THEN jurnal_umums.debit + jurnal_umums.kredit ELSE 0 END) AS penjualan')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Pembelian%" THEN jurnal_umums.debit + jurnal_umums.kredit ELSE 0 END) AS pembelian')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Pembelian%" THEN (barangs.harga+barangs.untung)*barangs.stok ELSE 0 END) AS total_jual')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Penjualan%')
            ->orWhere('akuns.nama', 'LIKE', '%Pembelian%')
            ->groupBy('usahas.nama')
            ->get();
        $this->beban = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Biaya%')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        $this->query('Beban', 'Bunga', 'bunga');
        $this->query('Beban', 'Denda', 'denda');
        $this->query('Beban', 'lain-lainnya', 'lain');
        $this->query('Kas', 'Bank', 'bank');
        $this->query('Kas', 'Bagi Hasil', 'hasil');
        $this->query('Kas', 'Sumbangan', 'sumbangan');
        $this->query('', 'Prive', 'prive');
        foreach ($this->jasa as $item) {
            $this->totaljasa = $this->totaljasa + $item->total;
        }
        foreach ($this->dagang as $item) {
            $this->totaldagang = $this->totaldagang + $item->penjualan - ($item->pembelian + $item->total_jual);
        }
        foreach ($this->beban as $item) {
            $this->totalbeban = $this->totalbeban + $item->total;
        }
        $this->labakotor = $this->totaljasa + $this->totaldagang + ($this->bank->total ?? 0 + $this->hasil->total ?? 0 + $this->sumbangan->total ?? 0);
        $this->totalbeban = $this->totalbeban + $this->bunga->total ?? 0 + $this->administrasi->total ?? 0 + $this->denda->total ?? 0 + $this->lain->total ?? 0;
        $this->lababersih = $this->labakotor + $this->totalbeban;
    }
    public function query($jenis, $keyword, $propertyName)
    {
        $propertyValue = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('jurnal_umums.created_at', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%' . $jenis . ' ' . $keyword . '%')
            ->first();

        $this->$propertyName = $propertyValue;
    }
    public function modal($propertyName)
    {
        $propertyValue = Modal::whereBetween('tahun', [$this->awal, $this->akhir])
            ->first();

        $this->$propertyName = $propertyValue;
    }
}
