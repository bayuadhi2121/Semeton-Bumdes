<?php

namespace App\Livewire\Usaha;

use App\Models\Usaha;
use Livewire\Component;

class ItemTable extends Component
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
        return view('livewire.usaha.item-table');
    }
}
