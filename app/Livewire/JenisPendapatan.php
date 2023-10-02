<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\JenisPendapatan as ModelsJenisPendapatan;

class JenisPendapatan extends Component
{
    use WithPagination;

    public $search = '';


    public function resetSearch()
    {
        $this->reset('search');
    }


    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.jenis-pendapatan.index', [
            'jenispendapatan' => ModelsJenisPendapatan::where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
