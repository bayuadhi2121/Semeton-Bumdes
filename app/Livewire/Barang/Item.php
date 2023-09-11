<?php

namespace App\Livewire\Barang;

use Livewire\Component;
use App\Models\Barang;

class Item extends Component
{
    public $number;
    public Barang $barang;

    public function mount($number = 0, Barang $barang)
    {
        $this->number = $number;
        $this->barang = $barang;
    }

    public function render()
    {
        return view('livewire.barang.item');
    }
}
