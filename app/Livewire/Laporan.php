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
        if ($this->laporan == 'neraca' || $this->laporan == 'modal') {
            return redirect()->to(route($this->laporan));
        }
        $route = 'laba';
        return redirect()->to(route($route, ['jenis' => $this->laporan]));
    }
}
