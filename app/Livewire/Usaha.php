<?php

namespace App\Livewire;

use App\Models\Usaha as ModelsUsaha;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Usaha extends Component
{
    use WithPagination;
    public $search = '';

    public Person $person;

    #[On('page-refresh', '$refresh')]

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.usaha', [
            'usaha' => ModelsUsaha::where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
