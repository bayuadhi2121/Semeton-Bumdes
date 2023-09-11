<?php

namespace App\Livewire\Person;

use App\Models\Person;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;

class ResetDeleteModal extends Component
{
    public $show;
    public $mode, $description;
    public $id_person, $nama_person;

    public function mount()
    {
        $this->show = false;
    }

    public function resetPassword()
    {
        Person::where('id_person', $this->id_person)->update([
            'password' => Hash::make('123')
        ]);

        $this->closeModal();
    }

    public function destroy()
    {
        Person::where('id_person', $this->id_person)->delete();

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('reset-modal')]
    public function resetModal($person, $nama)
    {
        $this->id_person = $person;
        $this->nama_person = $nama;
        $this->openModal('resetPassword', 'Reset password');
    }

    #[On('delete-modal')]
    public function deleteModal($person, $nama)
    {
        $this->id_person = $person;
        $this->nama_person = $nama;
        $this->openModal('destroy', 'Hapus pengelola');
    }

    private function openModal($mode, $description)
    {
        $this->mode = $mode;
        $this->description = $description;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.person.reset-delete-modal');
    }
}
