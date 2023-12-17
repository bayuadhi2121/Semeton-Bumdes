<?php

namespace App\Livewire\Laporan\Laba;

use App\Models\JurnalUmum;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dagang extends Component
{

    public $usaha;
    public $beban;
    public $awal, $akhir;
    public function mount($awal, $akhir)
    {
        $this->awal =  Carbon::parse($awal)->startOfDay();
        $this->akhir = Carbon::parse($akhir)->endOfDay();;
    }
    #[Layout('layouts.laporan')]

    public function render()
    {
        $this->usaha =
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
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Biaya%')
            ->where('usahas.status', 'Dagang')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();

        return view('livewire.laporan.laba.dagang');
    }
}
