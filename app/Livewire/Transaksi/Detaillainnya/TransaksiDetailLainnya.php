<?php

namespace App\Livewire\Transaksi\Detaillainnya;

use App\Models\JurnalUmum;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class TransaksiDetailLainnya extends Component

{
    use WithPagination;
    public $id_transaksi;
    public function render()
    {
        return view('livewire.transaksi.detaillainnya.index', [
            'transaksi' => Transaksi::where('id_transaksi', $this->id_transaksi)->first(),
            'detail' => JurnalUmum::where('id_transaksi', $this->id_transaksi)->paginate(10)
        ]);
    }

    public function mount(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
    }

    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
