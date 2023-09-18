<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class AddEditModal extends Component
{
    use WithFileUploads;

    public $show = false, $title, $mode;
    public $trxStatus, $usahaStatus;
    public $id_transaksi, $id_usaha, $tanggal, $keterangan = '', $dagangStatus, $nota = '';

    public function rules()
    {
        return [
            'tanggal' => 'required|before:tomorrow',
            'dagangStatus' => 'nullable|required_if:usahaStatus,Dagang',
        ];
    }

    protected $messages = [
        'tanggal.before' => 'Tanggal tidak diizinkan.',
        'dagangStatus' => 'Harus diisi.',
    ];

    public function mount($usaha, $status, $mode)
    {
        $this->show = false;
        $this->trxStatus = $status;
        $this->usahaStatus = $mode;
        $this->id_usaha = $usaha;
    }

    public function store()
    {
        $this->validate();

        $transaksi = Transaksi::create([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'status' => $this->trxStatus,
            'nota' => $this->nota,
            'id_usaha' => $this->id_usaha,
        ]);

        if($this->usahaStatus == 'Dagang') {
            $transaksi->dagang()->create(['status' => $this->dagangStatus])->save();
        }

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    public function update()
    {
        $this->validate();

        $transaksi = Transaksi::where('id_transaksi', $this->id_transaksi)->first();
        $transaksi->update([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'nota' => $this->nota,
        ]);

        if($this->usahaStatus == 'Dagang') {
            $transaksi->dagang()->update(['status' => $this->dagangStatus]);
        }

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
        $this->tanggal = $transaksi->tanggal;
        $this->keterangan = $transaksi->keterangan;
        $this->nota = $transaksi->nota;

        if(isset($transaksi->dagang->status)) {
            $this->usahaStatus = 'Dagang';
            $this->dagangStatus = $transaksi->dagang->status;
        }

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
        $this->resetExcept('trxStatus', 'usahaStatus', 'id_usaha');
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.transaksi.add-edit-modal');
    }
}
