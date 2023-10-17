<?php

namespace App\Livewire\Laporan\Laba;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Gabungan extends Component
{

    #[Layout('layouts.laporan')]
    public function render()
    {
        return view('livewire.laporan.laba.gabungan');
    }
}
