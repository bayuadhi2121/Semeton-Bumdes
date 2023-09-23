<?php

namespace App\Livewire\Transaksi\Detail;

use Livewire\Component;
use App\Models\JualBeli;
use App\Models\Transaksi;
use Livewire\Attributes\On;

class TransaksiDetailBeban extends Component
{
    public Transaksi $transaksi;

    public function mount(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.transaksi.detail.beban.index', [
            'jualbeli' => JualBeli::where('id_transaksi', $this->transaksi->id_transaksi)->get()
        ]);
    }
}
