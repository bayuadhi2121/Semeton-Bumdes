<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Item extends Component
{
    public $number, $link;
    public Transaksi $transaksi;

    public function mount($number = 0, Transaksi $transaksi)
    {
        $this->number = $number;
        $this->transaksi = $transaksi;
    }

    #[On('show')]
    public function  showDetail($transaksi)
    {
        $status = Transaksi::find($transaksi);
        if ($status->status == 'Lainnya') {
            $this->redirect(route('transaksidetaillain', [
                'transaksi' => $transaksi
            ]));
        } else {
            $this->redirect(route('transaksidetail', [
                'transaksi' => $transaksi
            ]));
        }
    }
    public function render()
    {
        return view('livewire.transaksi.item');
    }
}
