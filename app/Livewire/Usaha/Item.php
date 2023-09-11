<?php

namespace App\Livewire\Usaha;

use Livewire\Component;
use App\Models\Usaha;

class Item extends Component
{
    public $number;
    public Usaha $usaha;

    public function mount($number = 0, Usaha $usaha)
    {
        $this->number = $number;
        $this->usaha = $usaha;
    }

    public function render()
    {
        return view('livewire.usaha.item');
    }
}
