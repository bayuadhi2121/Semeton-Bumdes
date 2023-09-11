<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Person as ModelsPerson;

class Person extends Component
{
    use WithPagination;

    public $search = '';

    // refresh halaman jika page-refresh dipanggil
    #[On('page-refresh', '$refresh')]

    // hapus value dari search input
    public function resetSearch()
    {
        $this->reset('search');
    }

    // reset halaman jika terjadi update data pada search input
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.person.index', [
            'pengelola' => ModelsPerson::where('nama', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
