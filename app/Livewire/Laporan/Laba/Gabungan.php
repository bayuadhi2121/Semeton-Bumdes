<?php

namespace App\Livewire\Laporan\Laba;

use App\Models\JurnalUmum;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Gabungan extends Component
{
    public $jasa, $dagang, $beban;
    public $bank, $hasil, $sumbangan;
    public $bunga, $denda, $administrasi, $lain;
    public $awal, $akhir;
    public function mount($awal, $akhir)
    {
        $this->awal =  Carbon::parse($awal)->startOfDay();
        $this->akhir = Carbon::parse($akhir)->endOfDay();;
    }
    #[Layout('layouts.laporan')]
    public function render()
    {
        $this->jasa = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
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
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Harga Pokok Penjualan%" THEN jurnal_umums.debit + jurnal_umums.kredit ELSE 0 END) AS pembelian')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Penjualan%')
            ->orWhere('akuns.nama', 'LIKE', '%Harga Pokok Penjualan%')
            ->groupBy('usahas.nama')
            ->get();
        $this->beban = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Biaya%')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        $this->query('Beban', 'Bunga', 'bunga');
        $this->query('Beban', 'Denda', 'denda');
        $this->query('Beban', 'lain-lainnya', 'lain');
        $this->query('Kas', 'Bank', 'bank');
        $this->query('Kas', 'Bagi Hasil', 'hasil');
        $this->query('Kas', 'Sumbangan', 'sumbangan');
        return view('livewire.laporan.laba.gabungan');
    }
    public function query($jenis, $keyword, $propertyName)
    {
        $propertyValue = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%' . $jenis . ' ' . $keyword . '%')
            ->first();

        $this->$propertyName = $propertyValue;
    }
}
