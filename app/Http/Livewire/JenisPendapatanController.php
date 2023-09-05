<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisPendapatan;
use App\Models\Usaha;
use Livewire\WithPagination;

class JenisPendapatanController extends Component
{
    use WithPagination;
    public $nama;
    public $id_usaha;
    protected $rules = [
        'nama' => 'required|min:3',
        'id_usaha' => 'nullable'
    ];
    protected $messages = [
        'id_usaha.exists' => 'Usaha tidak ada '
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
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.jenis-pendapatan-controller', [
            'jenispendapatan' => jenispendapatan::latest()->paginate(10),
            'usaha' => Usaha::get()
        ]);
    }
}
