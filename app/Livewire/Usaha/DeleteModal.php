<?php

namespace App\Livewire\Usaha;

use App\Models\Usaha;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteModal extends Component
{
    public $show;
    public $id_usaha, $nama_usaha;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        Usaha::where('id_usaha', $this->id_usaha)->delete();

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('delete-modal')]
    public function delete($usaha, $nama)
    {
        $this->id_usaha = $usaha;
        $this->nama_usaha = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.usaha.delete-modal');
    }
}
