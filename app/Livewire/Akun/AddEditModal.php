<?php

namespace App\Livewire\Akun;

use App\Models\Akun;
use App\Models\Usaha;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditModal extends Component
{
    public $show, $mode, $title;
    public  $search = '', $showList;
    public $id_usaha, $nama, $id_akun;
    public Collection $usaha;
    protected $rules = [
        'nama' => 'required|min:2',
        'id_usaha' => 'nullable|exists:usahas,id_usaha'
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
    public function editModal(Akun $akun)
    {
        $this->id_akun = $akun->id_akun;
        $this->id_usaha = $akun->id_usaha;
        $this->nama = $akun->nama;
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
    public function setUsaha($id_usaha, $nama_usaha) //set value to input when user click dropdown on pengelola
    {
        $this->id_usaha = $id_usaha;
        $this->search = $nama_usaha;
    }
    public function store()
    {
        $this->validate();

        Akun::create([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }
    public function update()
    {
        $this->validate();

        Akun::find($this->id_akun)->update([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function render()
    {

        $this->usaha = Usaha::where('nama', 'like', '%' . $this->search . '%')->inRandomOrder()->limit(5)->orderBy('nama')->get();

        return view('livewire.akun.add-edit-modal', [
            'usaha' => $this->usaha
        ]);
    }
}
