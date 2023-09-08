<?php

namespace App\Livewire\Person;

use App\Models\Person;
use Livewire\Component;

use Livewire\Attributes\On;

class AddEditModal extends Component
{
    public $show, $mode, $title;                //variable for modal purpose
    public $id_person, $nama, $kontak, $status; // variable for entity
    protected $rules = [                        //rules for validation form        
        'nama' => 'required|min:3|unique:persons,nama',
        'status' => 'required',
        'kontak' => 'nullable|numeric',
    ];

    #[On('add-modal')]         // specific event to trigger this method in another component
    public function addModal() // function for opening modal and execute function Openmodal
    {
        $this->openModal('store', 'Tambah'); //execute openModal method with store(to insert data to db) as mode and tambah as title
    }
    private function openModal($mode, $title) //This function is used to determine the mode(whether it's for storing or updating data) and to set the title for a modal.
    {
        $this->show = true;                   // Set show to true to make modal appear
        $this->mode = $mode;
        $this->title = $title;
    }
    #[On('edit-modal')]
    public function editModal(Person $person) // setValue foreach variable
    {
        $this->id_person = $person->id_person;
        $this->nama = $person->nama;
        $this->kontak = $person->kontak;
        $this->status = $person->status;
        $this->openModal('update', 'Edit'); //execute openModal method to make modal appear with desire value
    }
    #[On('close-modal')]
    public function closeModal()   //close Modal
    {
        $this->show = false;        // make show to false
        $this->reset();             //reset all input
        $this->resetValidation();   // reset all validation on input
    }

    public function store()         // insert data to database
    {
        $validatedData = $this->validate(); //validate input

        $validatedData['nama'] = ucwords($this->nama); // uppercase first letter in string
        $validatedData['username'] = str_replace(" ", "", strtolower($this->nama)); //lower all letter
        Person::create($validatedData); //insert

        $this->closeModal();               //execute function closeModal to close modal
        $this->dispatch('page-refresh'); //refresh the component
    }
    public function update()
    {
        $this->validate([
            'nama' => 'required|min:3', // Modify validation to allow 'nama' to be the same
        ]);

        Person::find($this->id_person)->update([
            'nama' => $this->nama,
            'kontak' => $this->kontak,
            'status' => $this->status,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }
    public function updated($propertyName) // update live for validation
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.person.add-edit-modal');
    }
}
