<?php

namespace App\Livewire;

use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class Hutang extends Component
{
    use WithPagination;
    public $page = 1;

    #[Url('bumdes')]
    public $is_hutang = false;

    public $perPage = 1;
    #[On('page-refresh', '$refresh')]

    public function setHutang($is_hutang = false)
    {
        $this->is_hutang = $is_hutang;
    }

    public function render()
    {
        $result = Usaha::where('id_person', Auth::user()->id_person)->get();
        $hutangs = [];

        foreach ($result as $usaha) {
            foreach ($usaha->transaksi as $transaksi) {
                if ($transaksi->hutang != [] && $transaksi->hutang->total != $transaksi->hutang->bayar && $transaksi->is_hutang == $this->is_hutang) {
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
