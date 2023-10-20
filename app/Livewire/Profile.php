<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $username, $usernameOld, $kontak, $passNow, $passNew, $passConfirm;

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->usernameOld = $this->username;
        $this->kontak = auth()->user()->kontak;
    }

    public function updatedPassConfirm()
    {
        $this->validate([
            'passConfirm' => 'same:passNew'
        ]);
    }

    public function save()
    {
        $rules = [
            'kontak' => 'nullable',
            'username' => 'required'
        ];

        if($this->username != $this->usernameOld) {
            $rules['username'] = 'required|unique:persons';
        }

        if($this->passNew != null || $this->passConfirm != null) {
            $rules['passConfirm'] = 'same:passNew';
            $rules['passNow'] = 'required';

            if (!Hash::check($this->passNow, auth()->user()->password)) {
                return;
            } else {

            }
        }

        $this->validate($rules);

        Person::where('id_person', auth()->user()->id_person)->update([
            'username' => $this->username,
            'kontak' => $this->kontak,
            'password' => Hash::make($this->passNew)
        ]);
        $this->resetValidation();
        $this->reset(['passNew', 'passConfirm', 'passNow']);
    }

    public function render()
    {
        return view('livewire.person.profile');
    }
}
