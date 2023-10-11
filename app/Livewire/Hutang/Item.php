<?php

namespace App\Livewire\Hutang;

use App\Models\Hutang;
use Livewire\Component;

class Item extends Component
{
    public $number;
    public Hutang $hutang;

    public function mount($number = 0, Hutang $hutang)
    {
        $this->number = $number;
        $this->hutang = $hutang;
    }
    public function render()
    {
        return view('livewire.hutang.item');
    }
}
