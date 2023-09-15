<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class AddEditModal extends Component
{
    use WithFileUploads;

    public $show = false, $title, $mode, $statusMode;
    public $id_transaksi, $id_usaha, $tanggal, $keterangan = '', $status, $nota = '';

    public function rules()
    {
        return [
            'tanggal' => 'required',
        ];
    }

    public function mount($usaha, $status)
    {
        $this->show = false;
        $this->statusMode =  $status;
        $this->id_usaha = $usaha;
    }

    public function storeDagang()
    {
        // dd(strtotime($this->tanggal));
        $this->validate();

        Transaksi::create([
            'tanggal' => strtotime($this->tanggal),
            'keterangan' => $this->keterangan,
            'status' => $this->status,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function updateDagang()
    {
        $this->validate();

        Transaksi::where('id_transaksi', $this->id_transaksi)->update([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'status' => $this->status,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function storeJasa()
    {
        $this->validate();

        Transaksi::create([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    public function updateJasa()
    {
        $this->validate();

        Transaksi::where('id_transaksi', $this->id_transaksi)->update([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('add-modal-dagang')]
    public function addModalDagang()
    {
        $this->openModal('storeDagang', 'Tambah');
    }

    #[On('add-modal-jasa')]
    public function addModalJasa()
    {
        $this->openModal('storeJasa', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
        $this->tanggal = $transaksi->tanggal;
        $this->keterangan = $transaksi->keterangan;
        $this->status = $transaksi->status;
        $this->nota = $transaksi->nota;
        $this->id_usaha = $transaksi->id_usaha;

        if($this->statusMode == "Dagang") {
            $this->openModal('updateDagang', 'Edit');
        } else {
            $this->openModal('updateJasa', 'Edit');
        }
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
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.transaksi.add-edit-modal');
    }
}
