<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class PersonController extends Component
{
    use WithPagination;

    public $id_person, $delete, $nama, $status, $kontak;
    public $search;
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public function setAction($id_person, $action)
    {
        $this->id_person = $id_person;
        $this->delete = $action;
    }

    public function save()
    {
        if ($this->id_person == '') {
            $this->store();
        } else {
            $this->update();
        }
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nama' => 'required|min:3',
            'status' => 'required',
            'kontak' => 'nullable',
        ]);
        $validatedData['username'] = $this->nama;

        Person::create($validatedData);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit(Person $person)
    {
        $this->id_person = $person->id_person;
        $this->nama = $person->nama;
        $this->status = $person->status;
        $this->kontak = $person->kontak;
    }

    public function update()
    {
        Person::find($this->id_person)->update([
            'nama' => $this->nama,
            'kontak' => $this->kontak,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function runAction()
    {
        if($this->delete) {
            $this->destroy();
        } else {
            $this->resetPassword();
        }
    }

    public function resetPassword()
    {
        Person::where('id_person', $this->id_person)->update(['password' => Hash::make('123')]);
    }
    public function destroy()
    {
        Person::destroy($this->id_person);
        $this->reset();
    }

    public function resetInput()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.person-controller', [
            'pengelola' => $this->search === null ? Person::latest()->paginate(10) :
                Person::where('nama', 'like', '%' . $this->search . '%')->latest()->paginate(5)
        ]);
    }
}
