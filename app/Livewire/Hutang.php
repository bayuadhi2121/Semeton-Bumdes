<?php

namespace App\Livewire;

use App\Models\Hutang as ModelsHutang;
use App\Models\Usaha;
use Livewire\Component;
use Livewire\WithPagination;

class Hutang extends Component
{
    use WithPagination;
    public function render()
    {
        // $hutang = ModelsHutang::all();
        // dd($hutang->transaksi);
        return view('livewire.hutang.index', [
            'hutang' => ModelsHutang::paginate(10)
        ]);
    }
}
