<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;

class Item extends Component
{
    public $number, $link;
    public Transaksi $transaksi;

    public function mount($number = 0, Transaksi $transaksi)
    {
        $this->number = $number;
        $this->transaksi = $transaksi;
        $this->link = 'detail' . strtolower($transaksi->status);
    }

    public function render()
    {
        return view('livewire.transaksi.item');
    }
}
