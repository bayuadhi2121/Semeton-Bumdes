<?php

namespace App\Livewire\Transaksilainnya;

use App\Models\Transaksi;
use Livewire\Component;

use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;

    public $id_transaksi, $nama_akun;
    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        Transaksi::where('id_transaksi', $this->id_transaksi)->delete();

        $this->closeModal();
        $this->dispatch('page-refresh');
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
        return view('livewire.transaksilainnya.delete-modal');
    }
}
