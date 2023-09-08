<?php

namespace App\Livewire;

use App\Models\Akun as ModelsAkun;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Akun extends Component
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
        return view('livewire.akun', [
            'akun' => ModelsAkun::where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
