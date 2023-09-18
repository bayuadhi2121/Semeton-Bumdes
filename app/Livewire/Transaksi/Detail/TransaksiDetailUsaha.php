<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Transaksi;
use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Transaksi as ModelsTransaksi;

class TransaksiDetailUsaha extends Component
{
    public $id_transaksi, $status;

    public function mount(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
        if ($transaksi->dagang->status ?? null) {
            $this->status = 'Barang';
        } else {
            $this->status = 'Jasa';
        }
    }

    public function render()
    {
        return view('livewire.transaksi.detail.usaha', [
            'transaksi' => Transaksi::where('id_transaksi', $this->id_transaksi)->first()
        ]);
    }
}
