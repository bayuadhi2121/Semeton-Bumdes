<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;

class Item extends Component
{
    public $number;
    public Transaksi $transaksi;

    public function mount($number = 0, Transaksi $transaksi)
    {
        $this->number = $number;
        $this->transaksi = $transaksi;
    }

    public function render()
    {
        return view('livewire.transaksi.item');
    }
}
