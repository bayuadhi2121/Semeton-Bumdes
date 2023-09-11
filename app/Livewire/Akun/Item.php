<?php

namespace App\Livewire\Akun;

use Livewire\Component;
use App\Models\Akun;

class Item extends Component
{
    public $number;
    public Akun $akun;

    public function mount($number = 0, Akun $akun)
    {
        $this->number = $number;
        $this->akun = $akun;
    }

    public function render()
    {
        return view('livewire.akun.item');
    }
}
