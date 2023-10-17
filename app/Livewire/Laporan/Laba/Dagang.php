<?php

namespace App\Livewire\Laporan\Laba;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dagang extends Component
{

    #[Layout('layouts.laporan')]
    public function render()
    {
        return view('livewire.laporan.laba.dagang');
    }
}
