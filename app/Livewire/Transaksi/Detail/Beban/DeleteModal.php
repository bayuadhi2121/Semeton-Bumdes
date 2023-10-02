<?php

namespace App\Livewire\Transaksi\Detail\Beban;

use App\Models\JualBeli;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show = false;
    public $id_jualbeli, $nama;

    public function destroy()
    {
        JualBeli::where('id_jualbeli', $this->id_jualbeli)->first()->delete();

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete($jualbeli, $nama)
    {
        $this->id_jualbeli = $jualbeli;
        $this->nama = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.transaksi.detail.beban.delete-modal');
    }
}
