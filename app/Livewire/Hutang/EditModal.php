<?php

namespace App\Livewire\Hutang;

use App\Models\Hutang;
use Livewire\Component;
use Livewire\Attributes\On;

class EditModal extends Component
{

    public $show, $title, $mode;
    public $id_hutang, $bayar, $dibayar;

    public function rules()
    {
        return [
            'dibayar' => 'required|numeric',
        ];
    }
    public function mount()
    {
        $this->show = false;
    }
    public function update()
    {
        $this->validate();
        $hutang = Hutang::where('id_hutang', $this->id_hutang)->first();
        // dd($hutang->is_hutang);

        $id_kas = "";
        $id_hutang = "";
        $id_piutang = "";

        foreach ($hutang->transaksi->usaha->akun as $item) {
            if (strpos($item->nama, 'Kas ' . $item->usaha->nama) === 0) {
                $id_kas = $item->id_akun;
            } elseif (strpos($item->nama, 'Hutang ' . $item->usaha->nama) === 0) {
                $id_hutang = $item->id_akun;
            } elseif (strpos($item->nama, 'Piutang ' . $item->usaha->nama) === 0) {
                $id_piutang = $item->id_akun;
            }
        }

        $hutang->transaksi->jurnalumum()->CreateMany([
            [
                'id_akun' => $id_kas,
                'id_transaksi' => $hutang->transaksi->id_transaksi,
                'debit' => $hutang->is_hutang ? 0 : $this->dibayar,
                'kredit' => $hutang->is_hutang ? $this->dibayar : 0,
            ],
            [
                'id_akun' => $hutang->is_hutang ? $id_hutang : $id_piutang,
                'id_transaksi' => $hutang->transaksi->id_transaksi,
                'debit' => $hutang->is_hutang ? $this->dibayar : 0,
                'kredit' => $hutang->is_hutang ? 0 : $this->dibayar,
            ],
        ]);

        // Update the 'bayar' attribute
        $hutang->update([
            'bayar' => $this->bayar + $this->dibayar,
        ]);

        $this->closeModal();
        $this->dispatch('page-refresh');
    }

    #[On('add-modal')]
    public function addModal(Hutang $hutang)
    {
        $this->id_hutang = $hutang->id_hutang;
        $this->bayar = $hutang->bayar;
        $this->openModal('update', 'Tambah');
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
        return view('livewire.hutang.edit-modal');
    }
}
