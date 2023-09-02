<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class PersonController extends Component
{
    use WithPagination;

    public $id_person, $act, $nama, $status, $kontak;
    public $search;
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public function from($id, $act)
    {
        $this->id_person = $id;
        $this->act = $act;
    }
    public function action()
    {
        if ($this->id_person == '' && $this->act == '') {

            $this->store();
        } else if ($this->id_person != '' && $this->act == '') {

            $this->update();
        } else {
            if ($this->act == "reset") {
                $this->resetData();
            } else {
                $this->destroy();
            }
        }
    }
    public function setData(Person $person)
    {
        $this->id_person = $person->id_person;
        $this->nama = $person->nama;
        $this->status = $person->status;
    }
    public function update()
    {
        Person::find($this->id_person)->update([
            'nama' => $this->nama,
            'kontak' => $this->kontak,
            'status' => $this->status,
        ]);
        $this->dispatch('close-modal');
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
        $this->dispatch('close-modal');
    }
    public function resetData()
    {
        Person::where('id_person', $this->id_person)->update(['password' => Hash::make('123')]);
    }
    public function destroy()
    {
        Person::destroy($this->id_person);
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
