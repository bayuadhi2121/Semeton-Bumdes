<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;
    public $id_barang, $nama_barang;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        Barang::where('id_barang', $this->id_barang)->delete();

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete($barang, $nama)
    {
        $this->id_barang = $barang;
        $this->nama_barang = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.barang.delete-modal');
    }
}
