<?php

namespace App\Livewire\Laporan\Laba;

use App\Models\JurnalUmum;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Jasa extends Component
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

        $this->usaha = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Kas%')
            ->where('usahas.status', 'Jasa')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        $this->beban = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$this->awal, $this->akhir])
            ->where('akuns.nama', 'LIKE', '%Biaya%')
            ->where('usahas.status', 'Jasa')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        // dd($this->beban);
        return view('livewire.laporan.laba.jasa');
    }
}
