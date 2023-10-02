<?php

namespace App\Livewire\Akun;

use App\Models\Akun;
use Exception;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteModal extends Component
{
    public $show;
    public $id_akun, $nama_akun;

    public function mount()
    {
        $this->show = false;
    }

    public function destroy()
    {
        try {
            Akun::where('id_akun', $this->id_akun)->delete();
        } catch (Exception $e) {
        }


        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('delete-modal')]
    public function delete($akun, $nama)
    {
        $this->id_akun = $akun;
        $this->nama_akun = $nama;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.akun.delete-modal');
    }
}
