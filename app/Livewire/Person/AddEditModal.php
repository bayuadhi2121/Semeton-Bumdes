<?php

namespace App\Livewire\Person;

use App\Models\Person;
use Livewire\Component;
use Livewire\Attributes\On;

class AddEditModal extends Component
{
    public $show, $title, $mode;
    public $id_person, $nama, $kontak, $status;

    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'status' => 'required',
            'kontak' => 'nullable|numeric',
        ];
    }

    public function mount()
    {
        $this->show = false;
    }

    public function store()
    {
        $validatedData = $this->validate();

        $validatedData['nama'] = ucwords($this->nama);
        $validatedData['username'] = str_replace(" ", "", strtolower($this->nama));
        Person::create($validatedData);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function update()
    {
        $this->validate();

        Person::find($this->id_person)->update([
            'nama' => $this->nama,
            'kontak' => $this->kontak,
            'status' => $this->status,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Person $person)
    {
        $this->id_person = $person->id_person;
        $this->nama = $person->nama;
        $this->kontak = $person->kontak;
        $this->status = $person->status;
        $this->openModal('update', 'Edit');
    }

    private function openModal($mode, $title)
    {
        $this->show = true;
        $this->mode = $mode;
        $this->title = $title;
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->show = false;
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.person.add-edit-modal');
    }
}
