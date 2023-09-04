<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisPendapatan;
use Livewire\WithPagination;

class JenisPendapatanController extends Component
{
    use WithPagination;
    public $nama, $id_usaha;
    protected $rules = [
        'nama' => 'required|min:3|unique:persons',

    ];
    public function store()
    {
        $validatedData = $this->validate();

        JenisPendapatan::create($validatedData);
        $this->dispatch('close-modal');
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->resetValidation();
        $this->reset();
    }
    public function render()
    {
        return view('livewire.jenis-pendapatan-controller', [
            'jenispendapatan' => jenispendapatan::latest()->paginate(10)
        ]);
    }
}
