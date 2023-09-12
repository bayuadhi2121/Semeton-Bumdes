<?php

namespace App\Livewire\Transaksi;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Transaksi;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class AddEditModal extends Component
{
    use WithFileUploads;

    public $show, $title, $mode, $statusMode;
    public $id_transaksi, $id_usaha, $tanggal, $keterangan = '', $status, $nota = '';

    #[Url]
    public $usaha;

    public function rules()
    {
        return [
            'tanggal' => 'required',
        ];
    }

    public function cek()
    {
        dd($this->usaha);
    }

    public function mount($status)
    {
        $this->show = false;
        $this->statusMode =  $status;
        $this->id_usaha = $this->usaha;
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
            'tanggal' => (new Carbon($this->tanggal))->toDateString(),
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    public function updateJasa()
    {
        $this->validate();

        Transaksi::where('id_transaksi', $this->id_transaksi)->update([
            'tanggal' => (new Carbon($this->tanggal))->toDateString(),
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
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
        $this->tanggal = (new Carbon($transaksi->tanggal))->toDateString();
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
        $this->show = false;
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        // $this->usaha = Usaha::where('nama', 'like', '%'.$this->search.'%')->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.transaksi.add-edit-modal');
    }
}
