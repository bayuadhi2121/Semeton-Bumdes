<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Akun as ModelsAkun;

class Akun extends Component
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
        return view('livewire.akun.index', [
            'akun' => ModelsAkun::where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
