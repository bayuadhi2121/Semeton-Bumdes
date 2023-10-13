<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Laporan extends Component
{
    public $laporan;
    public function render()
    {
        return view('livewire.laporan.laporan');
    }
    public function print()
    {
        if ($this->laporan == 'jasa') {
            $route = 'laba';
            return redirect()->to(route($route, ['jenis' => $this->laporan]));
        }

        return redirect()->to(route($this->laporan));
    }
}
