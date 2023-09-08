<?php

namespace App\Livewire\JPendapatan;

use App\Models\JenisPendapatan;
use Livewire\Component;

class ItemTable extends Component
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
        return view('livewire.j-pendapatan.item-table');
    }
}
