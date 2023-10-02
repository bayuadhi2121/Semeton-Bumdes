<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\JualBeli;
use Livewire\Component;

class Item extends Component
{
    public $number, $status;
    public JualBeli $jualbeli;
    public function mount($number = 0, JualBeli $jualbeli, $status)
    {
        $this->number = $number;
        $this->jualbeli = $jualbeli;
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.transaksi.detail.item');
    }
}
