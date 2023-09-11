<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Barang as ModelsBarang;

class Barang extends Component
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
        return view('livewire.barang.index', [
            'barang' => ModelsBarang::where('nama', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
