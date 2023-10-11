<?php

namespace App\Livewire;

use App\Models\Usaha;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class Hutang extends Component
{
    use WithPagination;
    public $page = 1;
    public $perPage = 1;
    #[On('page-refresh', '$refresh')]

    public function render()
    {
        $result = Usaha::where('id_person', Auth::user()->id_person)->get();
        $hutangs = [];

        foreach ($result as $usaha) {
            foreach ($usaha->transaksi as $transaksi) {
                if ($transaksi->hutang != [] && $transaksi->hutang->total != $transaksi->hutang->bayar) {
                    $hutangs[] = $transaksi->hutang;
                }
            }
        }
        $paginator = collect($hutangs);

        return view('livewire.hutang.index', [
            'hutang' => $paginator->paginate(10)
        ]);
    }
}
