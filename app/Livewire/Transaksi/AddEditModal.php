<?php

namespace App\Livewire\Akun;

use App\Models\Akun;
use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;

class AddEditModal extends Component
{
    public $show, $showList, $title, $mode, $search = '';
    public $id_akun, $id_usaha, $nama;

    public Collection $usaha;

    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'id_usaha' => 'nullable|exists:usahas,id_usaha'
        ];
    }

    public function mount()
    {
        $this->show = false;
    }

    public function store()
    {
        $this->validate();

        Akun::create([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function update()
    {
        $this->validate();

        Akun::where('id_akun', $this->id_akun)->update([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function setUsaha($id_usaha, $nama_usaha)
    {
        $this->id_usaha = $id_usaha;
        $this->search = $nama_usaha;
    }

    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Akun $akun)
    {
        $this->id_akun = $akun->id_akun;
        $this->nama = $akun->nama;
        $this->id_usaha = $akun->id_usaha;
        $this->search = $akun->usaha->nama ?? '';
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

    public function showUsaha()
    {
        $this->showList = true;
    }

    public function closeUsaha()
    {
        $this->showList = false;
    }

    public function updatedSearch()
    {
        if($this->usaha->contains('nama', $this->search)) {
            $this->id_usaha = $this->usaha->where('nama', $this->search)->first()->id_usaha;
            $this->resetValidation();
        } else if($this->search != '') {
            $this->id_usaha = 'zxcvbnm,./';
        } else {
            $this->reset('id_usaha');
            $this->resetValidation();
        }
    }

    public function render()
    {
        $this->usaha = Usaha::where('nama', 'like', '%'.$this->search.'%')->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.akun.add-edit-modal', [
            'usaha' => $this->usaha
        ]);
    }
}
