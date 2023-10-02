<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Usaha as ModelsUsaha;

class Usaha extends Component
{
    use WithPagination;

    public $search = '';

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
        return view('livewire.usaha.index', [
            'usaha' => ModelsUsaha::where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
