<?php

namespace App\Livewire\JPendapatan;

use App\Models\JenisPendapatan;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteModal extends Component
{
    public $show;
    public $id_jpendapatan, $nama_jpendapatan;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        JenisPendapatan::where('id_jpendapatan', $this->id_jpendapatan)->delete();

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('delete-modal')]
    public function delete($id_jpendapatan, $nama)
    {
        $this->id_jpendapatan = $id_jpendapatan;
        $this->nama_jpendapatan = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.j-pendapatan.delete-modal');
    }
}
