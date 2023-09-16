<?php

namespace App\Livewire\Transaksilainnya;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\Attributes\On;

class AddEditModal extends Component
{
    public $show, $title, $mode;
    public $id_transaksi, $tanggal, $keterangan, $status, $nota = '';
    public function rules()
    {
        return [
            'tanggal' => 'required',
            'keterangan' => 'required',
        ];
    }
    public function mount()
    {
        $this->show = false;
    }
    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    public function store()
    {
        $this->validate();

        Transaksi::create([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'status' => 'lainnya'
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('edit-modal')]
    public function editModal(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
        $this->tanggal = $transaksi->tanggal;
        $this->keterangan = $transaksi->keterangan;
        $this->status = $transaksi->status;
        $this->nota = $transaksi->nota;
        $this->openModal('update', 'Edit');
    }
    public function update()
    {
        $this->validate();

        Transaksi::where('id_transaksi', $this->id_transaksi)->update([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
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
    public function render()
    {
        return view('livewire.transaksilainnya.add-edit-modal');
    }
}
