<?php

namespace App\Livewire\Transaksi\Detaillainnya;

use App\Models\JurnalUmum;
use Livewire\Component;

class Item extends Component
{
    public $number;
    public JurnalUmum $detail;

    public function mount($number = 0, JurnalUmum $detail)
    {
        $this->number = $number;
        $this->detail = $detail;
    }


    public function render()
    {
        return view('livewire.transaksi.detaillainnya.item');
    }
}
