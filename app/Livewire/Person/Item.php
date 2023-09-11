<?php

namespace App\Livewire\Person;

use Livewire\Component;
use App\Models\Person;

class Item extends Component
{
    public $number; // menyimpan nomor urut item pada tabel
    public Person $person; // menyimpan data pengelola

    // fungsi yang dijalankan saat livewire fibuat
    public function mount($number = 0, Person $person)
    {
        $this->number = $number;
        $this->person = $person;
    }

    // gunakan view dibawah untuk ditampilkan
    public function render()
    {
        return view('livewire.person.item');
    }
}
