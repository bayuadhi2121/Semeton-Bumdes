<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Barang;
use App\Models\JualBeli;
use Livewire\Component;

use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;
    public $id_jualbeli;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        $jualbeli = JualBeli::where('id_jualbeli', $this->id_jualbeli)->first();
        // if ($jualbeli->transaksi->dagang->status == 'Beli') {
        //     $stok = $jualbeli->jbdagang->barang->stok - $jualbeli->kuantitas;
        // } else if ($jualbeli->transaksi->dagang->status == 'Jual') {
        //     $stok = $jualbeli->jbdagang->barang->stok + $jualbeli->kuantitas;
        // }
        // $jualbeli->jbdagang->barang->update([
        //     'stok' => $stok
        // ]);
        $jualbeli->delete();
        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete(JualBeli $jualbeli)
    {
        $this->id_jualbeli = $jualbeli->id_jualbeli;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.transaksi.detail.delete-modal');
    }
}
