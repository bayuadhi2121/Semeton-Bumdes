<?php

namespace App\Livewire\Usaha;

use App\Models\Akun;
use App\Models\Usaha;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

use function Livewire\store;

class AddEditModal extends Component
{
    public $show, $showList, $title, $mode, $search = '';
    public $id_person, $id_usaha, $nama, $status;
    public Collection $person;

    public function rules()
    {
        return [
            'nama' => 'required|min:2',
            'status' => 'required',
            'id_person' => 'nullable|exists:persons,id_person'
        ];
    }

    public function mount()
    {
        $this->show = false;
        $this->showList = false;
    }

    public function store()
    {
        $this->validate();

        $usaha = Usaha::create([
            'nama' => $this->nama,
            'status' => $this->status,
            'id_person' => $this->id_person
        ]);

        $this->storeAkun($usaha);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function storeAkun(Usaha $usaha)
    {
        if ($usaha->status == 'Jasa') {
            $usaha->akun()->CreateMany([
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Kas ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Pendapatan ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Hutang ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Piutang ' . $usaha->nama
                ],
            ]);
        } else {
            $usaha->akun()->CreateMany([
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Pembelian ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Penjualan ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Kas ' . $usaha->nama
                ],
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Hutang ' . $usaha->nama
                ],
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Piutang ' . $usaha->nama
                ],
            ]);
        }
    }

    public function update()
    {
        $this->validate();

        $usaha = Usaha::find($this->id_usaha);
        $akun = Akun::where('id_usaha', $this->id_usaha)->get();

        // if ($akun) {
        //     foreach ($akun as $item) {
        //         $item->delete();
        //     }
        // }    
        $usaha->update([
            'nama' => $this->nama,
            'status' => $this->status,
            'id_person' => $this->id_person,
        ]);
        // dd($akun);

        if ($this->status == 'Barang') {
        }
        // $this->storeAkun($usaha);
        $this->closeModal();
        $this->dispatch('page-refresh');
    }


    public function setPerson($id_person, $nama_person)
    {
        $this->id_person = $id_person;
        $this->search = $nama_person;
    }

    public function createPerson()
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

    public function updatedSearch()
    {
        if ($this->person->contains('nama', $this->search)) {
            $this->id_person = $this->person->where('nama', $this->search)->first()->id_person;
            $this->resetValidation();
        } else if ($this->search != '') {
            $this->id_person = 'zxcvbnm,./';
        } else {
            $this->reset('id_person');
            $this->resetValidation();
        }
    }

    public function render()
    {
        $this->person = Person::where('nama', 'like', '%' . $this->search . '%')->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.usaha.add-edit-modal', [
            'pengelola' => $this->person
        ]);
    }
}
