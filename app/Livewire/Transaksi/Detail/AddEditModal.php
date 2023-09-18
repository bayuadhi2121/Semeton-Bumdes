<?php

namespace App\Livewire\Transaksi\Detail;

use Livewire\Component;

class AddEditModal extends Component
{
    public $status;
    public function render()
    {
        return view('livewire.transaksi.detail.add-edit-modal');
    }
}
