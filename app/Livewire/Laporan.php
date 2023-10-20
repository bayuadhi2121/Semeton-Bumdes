<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Laporan extends Component
{
    public $laporan;
    public $awal, $akhir;

    public function render()
    {
        return view('livewire.laporan.laporan');
    }
    public function print()
    {
        $this->validate([
            'laporan' => 'required',
            'awal' => 'required|date',
            'akhir' => 'required|date|after_or_equal:awal',
        ]);
        if ($this->laporan == 'neraca' || $this->laporan == 'modal') {
            return redirect()->to(route($this->laporan, ['awal' => $this->awal, 'akhir' => $this->akhir]));
        }
        return redirect()->to(route(strtolower($this->laporan), ['awal' => $this->awal, 'akhir' => $this->akhir]));
    }
}
