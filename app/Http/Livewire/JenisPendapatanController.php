<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisPendapatan;
use Livewire\WithPagination;

class JenisPendapatanController extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.jenis-pendapatan-controller', [
            'jenispendapatan' => jenispendapatan::latest()->paginate(10)
        ]);
    }
}
