<?php

namespace App\Livewire\Transaksi\Detaillainnya;

use App\Models\JurnalUmum;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show, $id_jumum;
    public function render()
    {
        return view('livewire.transaksi.detaillainnya.delete-modal');
    }

    public function mount()
    {
        $this->show = false;
    }

    #[On('delete-modal')]
    public function delete(JurnalUmum $jurnalumum)
    {
        $this->id_jumum = $jurnalumum->id_jumum;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function destroy()
    {
        JurnalUmum::where('id_jumum', $this->id_jumum)->delete();

        $this->closeModal();
        $this->dispatch('refresh-data');
    }
}
