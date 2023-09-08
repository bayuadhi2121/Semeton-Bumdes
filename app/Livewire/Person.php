<?php

namespace App\Livewire;

use App\Models\Person as ModelsPerson;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Person extends Component
{
    use WithPagination;
    public $search = '';
    #[On('page-refresh', '$refresh')] // refresh this component

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
        return view('livewire.person.index', [
            'pengelola' => ModelsPerson::where('nama', 'like', '%' . $this->search . '%')->where('status', '!=', 'Ketua')->paginate(10)

        ]);
    }
}
