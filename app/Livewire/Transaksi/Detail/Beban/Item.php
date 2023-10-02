<?php

namespace App\Livewire\Transaksi\Detail\Beban;

use App\Models\JualBeli;
use Livewire\Component;
use App\Models\Transaksi;

class Item extends Component
{
    public $number;
    public JualBeli $jualbeli;

    public function mount($number = 0, JualBeli $jualbeli)
    {
        $this->number = $number;
        $this->jualbeli = $jualbeli;
    }

    public function render()
    {
        return view('livewire.transaksi.detail.beban.item');
    }
}
