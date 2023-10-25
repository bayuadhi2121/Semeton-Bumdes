<?php

namespace App\Livewire\JenisPendapatan;

use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\JenisPendapatan;
use Illuminate\Database\Eloquent\Collection;

class AddEditModal extends Component
{
    public $show, $showList, $title, $mode, $search = '';
    public $id_jenis_pendapatan, $id_usaha, $nama;

    public Collection $usaha;

    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'search' => 'required|exists:usahas,id_usaha'
        ];
    }
    public function messages()
    {
        return [
            'search.required' => 'usaha wajib diisi.',
        ];
    }

    public function mount()
    {
        $this->show = false;
    }

    public function store()
    {
        $this->validate();

        JenisPendapatan::create([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    public function update()
    {
        $this->validate();

        JenisPendapatan::where('id_jpendapatan', $this->id_jenis_pendapatan)->update([
            'nama' => $this->nama,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
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
    public function editModal(JenisPendapatan $jenisPendapatan)
    {
        $this->id_jenis_pendapatan = $jenisPendapatan->id_jpendapatan;
        $this->nama = $jenisPendapatan->nama;
        $this->id_usaha = $jenisPendapatan->id_usaha;
        $this->search = $jenisPendapatan->usaha->nama ?? '';
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
        if ($this->usaha->contains('nama', $this->search)) {
            $this->id_usaha = $this->usaha->where('id_person', auth()->user()->id_person)->where('nama', $this->search)->first()->id_usaha;
            $this->resetValidation();
        } else if ($this->search != '') {
            $this->id_usaha = 'zxcvbnm,./';
        } else {
            $this->reset('id_usaha');
            $this->resetValidation();
        }
    }

    public function render()
    {
        $this->usaha = Usaha::where('nama', 'like', '%' . $this->search . '%')->where('id_person', auth()->user()->id_person)->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.jenis-pendapatan.add-edit-modal', [
            'usaha' => $this->usaha
        ]);
    }
}
