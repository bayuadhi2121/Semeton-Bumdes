<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;
    public $id_transaksi;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        $transaksi = Transaksi::where('id_transaksi', $this->id_transaksi)->first();
        if($transaksi->nota) {
            Storage::disk('public')->delete($transaksi->nota);
        }
        $transaksi->delete();

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete($transaksi)
    {
        $this->id_transaksi = $transaksi;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.transaksi.delete-modal');
    }
}
