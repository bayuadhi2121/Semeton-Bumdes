<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Person as ModelsPerson;
use Illuminate\Support\Facades\Auth;

class Person extends Component
{
    use WithPagination;

    public $search = '';


    // hapus value dari search input
    public function resetSearch()
    {
        $this->reset('search');
    }

    // reset halaman jika terjadi update data pada search input


    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.person.index', [
            'pengelola' => ModelsPerson::where('status', '!=', 'Ketua')->where('nama', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
