<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class BarangController extends Component
{
    use WithPagination;
    public $nama, $harga, $untung, $stok, $stok_min, $id_barang;
    protected $rules = [
        'nama' => 'required|min:2',
        'harga' => 'required|numeric',
        'untung' => 'required|numeric',
        'stok' => 'required|numeric',
        'stok_min' => 'required|numeric',
    ];
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public function resetInput()
    {
        $this->resetValidation();
        $this->reset();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $validatedData = $this->validate();
        Barang::create($validatedData);

        $this->resetInput();
        $this->dispatch('close-modal');
    }
    public function destroy()
    {
    }
    public function delete()
    {
    }
    public function edit()
    {
    }
    public function render()
    {
        return view('livewire.barang-controller', [
            'barang' => Barang::orderBy('nama')->paginate(10)
        ]);
    }
}
