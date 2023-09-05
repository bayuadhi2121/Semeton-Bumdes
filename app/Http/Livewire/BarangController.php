<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class BarangController extends Component
{
    use WithPagination;
    public $nama, $harga, $untung, $stok, $stok_min, $id_barang;
    public $search, $delete;
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
        Barang::destroy($this->id_barang);
        $this->reset();
    }
    public function update()
    {
    }
    public function setAction($id_barang, $action)
    {
        $this->id_barang = $id_barang;
        $this->delete = $action;
    }
    public function runAction()
    {
        if ($this->delete) {
            $this->destroy();
        } else {
            $this->update();
        }
    }
    public function edit(Barang $item)
    {
        $this->nama = $item->nama;
        $this->id_barang = $item->id_barang;
        $this->harga = $item->harga;
        $this->untung = $item->untung;
        $this->stok = $item->stok;
        $this->stok_min = $item->stok_min;
    }
    public function render()
    {
        return view('livewire.barang-controller', [
            'barang' => $this->search == null ? Barang::orderBy('nama')->paginate(10) : Barang::where('nama', 'like', '%' . $this->search . '%')->latest()->paginate(5)
        ]);
    }
}
