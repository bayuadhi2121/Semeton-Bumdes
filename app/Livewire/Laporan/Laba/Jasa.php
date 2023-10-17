<?php

namespace App\Livewire\Laporan\Laba;

use App\Models\JurnalUmum;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Jasa extends Component
{
    public $usaha;

    #[Layout('layouts.laporan')]
    public function render()
    {
        $this->usaha = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->where('akuns.nama', 'LIKE', '%Kas%')
            ->where('usahas.status', 'Jasa')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();

        return view('livewire.laporan.laba.jasa');
    }
}
