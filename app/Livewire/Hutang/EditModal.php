<?php

namespace App\Livewire\Hutang;

use App\Models\Hutang;
use App\Models\JurnalUmum;
use Livewire\Attributes\On;
use Livewire\Component;

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
        $akunList = $hutang->transaksi->usaha->akun;

        // Determine the debit and credit values based on is_hutang
        $debit = $hutang->is_hutang ? $this->dibayar : 0;
        $kredit = $hutang->is_hutang ? 0 : $this->dibayar;

        foreach ($akunList as $akun) {
            $nama = strtolower($akun->nama);
            // Check for common conditions and create JurnalUmum accordingly
            if ($hutang->transaksi->usaha->status == 'Dagang' && $hutang->transaksi->dagang->status == 'Beli' && $hutang->is_hutang && strpos($nama, 'kas') !== false) {
                JurnalUmum::create([
                    'id_akun' => $akun->id_akun,
                    'id_transaksi' => $hutang->transaksi->id_transaksi,
                    'debit' => 0,
                    'kredit' => $this->dibayar,
                ]);
            }
            if (
                ($hutang->is_hutang && strpos($nama, 'hutang') !== false) ||
                (!$hutang->is_hutang && strpos($nama, 'piutang') !== false)
            ) {
                JurnalUmum::create([
                    'id_akun' => $akun->id_akun,
                    'id_transaksi' => $hutang->transaksi->id_transaksi,
                    'debit' => $debit,
                    'kredit' => $kredit,
                ]);
            } elseif (strpos($nama, 'kas') !== false && !$hutang->transaksi->dagang->status == 'Beli') {

                JurnalUmum::create([
                    'id_akun' => $akun->id_akun,
                    'id_transaksi' => $hutang->transaksi->id_transaksi,
                    'debit' => $hutang->is_hutang ? 0 : $this->dibayar,
                    'kredit' => $hutang->is_hutang ? $kredit : 0,
                ]);
            }
        }

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
