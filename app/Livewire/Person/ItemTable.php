<?php

namespace App\Livewire\Person;

use App\Models\Person;
use Livewire\Component;

class ItemTable extends Component
{
    public $number, $person;
    public function mount($number = 0, Person $person)
    {
        $this->number = $number;
        $this->person = $person;
    }
    public function render()
    {
        return view('livewire.person.item-table');
    }
}
