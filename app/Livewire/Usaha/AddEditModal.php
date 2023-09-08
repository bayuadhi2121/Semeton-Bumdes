<?php

namespace App\Livewire\Usaha;

use App\Models\Person;
use App\Models\Usaha;
use Livewire\Attributes\On;

use Illuminate\Database\Eloquent\Collection;

use Livewire\Component;

class AddEditModal extends Component
{

    public $show, $mode, $title;
    public  $search = '', $showList;
    public $id_person, $id_usaha, $nama, $status;
    public Collection $person;

    protected $rules = [
        'nama' => 'required|min:2',
        'status' => 'required',
        'id_person' => 'nullable|exists:persons,id_person'
    ];
    public function mount()
    {
        $this->show = false;
        $this->showList = false;
    }
    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Usaha $usaha)
    {
        $this->id_usaha = $usaha->id_usaha;
        $this->nama = $usaha->nama;
        $this->status = $usaha->status;
        $this->id_person = $usaha->id_person;
        $this->search = $usaha->person->nama ?? '';
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
    public function showPerson()
    {
        $this->showList = true;
    }

    public function closePerson()
    {
        $this->showList = false;
    }

    public function setPerson($id_person, $nama_person) //set value to input when user click dropdown on pengelola
    {
        $this->id_person = $id_person;
        $this->search = $nama_person;
    }
    public function createPerson()  //create person with deafult akuntan status
    {
        $nama = ucwords($this->search);
        $result = Person::create([
            'nama' => $nama,
            'username' => str_replace(" ", "", strtolower($this->search)),
            'status' => 'Akuntan'
        ]);

        $this->id_person = $result->id_person;
        $this->search = $nama;
    }
    public function store()
    {
        $this->validate();

        Usaha::create([
            'nama' => $this->nama,
            'status' => $this->status,
            'id_person' => $this->id_person
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }
    public function update()
    {
        $this->validate();

        Usaha::find($this->id_usaha)->update([
            'nama' => $this->nama,
            'status' => $this->status,
            'id_person' => $this->id_person,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function render()
    {
        $this->person = Person::where('nama', 'like', '%' . $this->search . '%')->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.usaha.add-edit-modal', [
            'pengelola' => $this->person
        ]);
    }
}
