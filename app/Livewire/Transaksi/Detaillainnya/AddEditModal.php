<?php

namespace App\Livewire\Transaksi\Detaillainnya;

use App\Models\Akun;
use App\Models\JurnalUmum;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

use Livewire\Attributes\On;

class AddEditModal extends Component
{
    public $show, $showList, $title, $mode, $search = '';
    public $id_akun, $debit, $kredit, $transaksi, $id_jumum;
    public Collection $person;

    public function rules()
    {
        return [
            'id_akun' => 'nullable|exists:akuns,id_akun',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ];
    }

    public function showPerson()
    {
        $this->showList = true;
    }

    public function closePerson()
    {
        $this->showList = false;
    }

    // public function updatedSearch()
    // {
    //     if ($this->person->contains('nama', $this->search)) {
    //         $this->id_akun = $this->person->where('nama', $this->search)->first()->id_akun;
    //         $this->resetValidation();
    //     } else if ($this->search != '') {
    //         $this->id_akun = 'zxcvbnm,./';
    //     } else {
    //         $this->reset('id_akun');
    //         $this->resetValidation();
    //     }
    // }
    public function render()
    {
        $this->person = Akun::where('nama', 'like', '%' . $this->search . '%')->where('id_usaha', null)->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.transaksi.detaillainnya.add-edit-modal', [
            'pengelola' => $this->person
        ]);
    }
    public function mount($transaksi)
    {
        $this->transaksi = $transaksi->id_transaksi;
        $this->show = false;
        $this->showList = false;
    }
    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }
    public function store()
    {
        $this->validate();
        JurnalUmum::create([
            'id_transaksi' => $this->transaksi,
            'id_akun' => $this->id_akun,
            'debit' => $this->debit,
            'kredit' => $this->kredit,
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }
    #[On('edit-modal')]
    public function editModal(JurnalUmum $jurnalumum)
    {
        $this->id_jumum = $jurnalumum->id_jumum;
        $this->id_akun = $jurnalumum->id_akun;
        $this->debit = $jurnalumum->debit;
        $this->kredit = $jurnalumum->kredit;
        $this->search = $jurnalumum->akun->nama;
        $this->openModal('update', 'Edit');
    }

    public function setPerson($id_akun, $nama_person)
    {
        $this->id_akun = $id_akun;
        $this->search = $nama_person;
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

    public function update()
    {
        $this->validate();

        $jurnalumum = JurnalUmum::find($this->id_jumum);

        $jurnalumum->update([
            'id_akun' => $this->id_akun,
            'debit' => $this->debit,
            'kredit' => $this->kredit,
        ]);
        $this->closeModal();
        $this->dispatch('refresh-data');
    }
}
