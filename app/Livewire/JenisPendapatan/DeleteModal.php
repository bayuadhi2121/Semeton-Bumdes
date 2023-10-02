<?php

namespace App\Livewire\JenisPendapatan;

use App\Models\JenisPendapatan;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;
    public $id_jenis_pendapatan, $nama_jenis_pendapatan;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        JenisPendapatan::where('id_jpendapatan', $this->id_jenis_pendapatan)->delete();

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete($jenisPendapatan, $nama)
    {
        $this->id_jenis_pendapatan = $jenisPendapatan;
        $this->nama_jenis_pendapatan = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.jenis-pendapatan.delete-modal');
    }
}
