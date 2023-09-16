<?php

namespace App\Livewire\Transaksilainnya;

use App\Models\Transaksi;
use Livewire\Component;

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
        return view('livewire.transaksilainnya.item');
    }
}
