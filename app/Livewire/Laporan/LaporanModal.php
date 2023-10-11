<?php

namespace App\Livewire\Laporan;

use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanModal extends Component
{
    public $data;
    #[Layout('layouts.laporan')]
    public function render()
    {
        return view('livewire.laporan.laporan-modal', []);
    }
}
