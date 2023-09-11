<?php

namespace App\Livewire\JenisPendapatan;

use Livewire\Component;
use App\Models\JenisPendapatan;

class Item extends Component
{
    public $number;
    public JenisPendapatan $jenispendapatan;

    public function mount($number = 0, JenisPendapatan $jenispendapatan)
    {
        $this->number = $number;
        $this->jenispendapatan = $jenispendapatan;
    }

    public function render()
    {
        return view('livewire.jenis-pendapatan.item');
    }
}
