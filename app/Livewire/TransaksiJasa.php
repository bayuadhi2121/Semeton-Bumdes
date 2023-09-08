<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class TransaksiJasa extends Component
{
    public $id_usaha;
    public function mount($id_usaha)
    {
        $this->id_usaha = $id_usaha;
    }

    #[On('trx')]
    public function getUsaha()
    {
        dd('test');
    }
    public function render()
    {
        return view('livewire.transaksi-jasa');
    }
}
