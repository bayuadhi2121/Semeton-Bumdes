<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\On;

class AddEditModal extends Component
{
    public $show, $title, $mode, $search = '';
    public $id_barang, $nama, $harga = 0, $untung = 0, $stok = 0, $stok_min = 1;

    public function rules()
    {
        return [
            'nama' => 'required|min:2',
            'harga' => 'required|numeric|gt:0',
            'untung' => 'required|numeric|gt:0',
            'stok' => 'required|numeric',
            'stok_min' => 'required|numeric|gt:0'
        ];
    }

    public function mount()
    {
        $this->show = false;
    }

    public function store()
    {
        $this->validate();

        Barang::create([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'untung' => $this->untung,
            'stok' => $this->stok,
            'stok_min' => $this->stok_min,
            'status' => 'Dagang',
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    public function update()
    {
        $this->validate();

        Barang::where('id_barang', $this->id_barang)->update([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'untung' => $this->untung,
            'stok' => $this->stok,
            'stok_min' => $this->stok_min
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Barang $barang)
    {
        $this->id_barang = $barang->id_barang;
        $this->nama = $barang->nama;
        $this->harga = $barang->harga;
        $this->untung = $barang->untung;
        $this->stok = $barang->stok;
        $this->stok_min = $barang->stok_min;
        $this->openModal('update', 'Edit');
    }

    private function openModal($mode, $title)
    {
        $this->show = true;
        $this->mode = $mode;
        $this->title = $title;
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->show = false;
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.barang.add-edit-modal');
    }
}
