<?php

namespace App\Livewire\Laporan;

use App\Models\Akun;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanNeraca extends Component
{
    public $akunKas;
    #[Layout('layouts.laporan')]
    public function render()
    {
        $this->setUsaha();
        return view('livewire.laporan.laporan-neraca', [
            'akunKas' => $this->akunKas
        ]);
    }

    public function setUsaha()
    {
        $this->akunKas = Akun::where('nama', 'LIKE', '%Kas%')->get();
    }
}
