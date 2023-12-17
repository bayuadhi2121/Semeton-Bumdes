<?php

namespace App\Livewire;

use App\Models\Usaha;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class Hutang extends Component
{
    use WithPagination;
    // public $page = 1;

    #[Url('bumdes')]
    public $is_hutang = false;

    // public $perPage = 1;
    #[On('page-refresh')]
    public function refresh()
    {
        $this->redirect(route('hutang', ['bumdes' => $this->is_hutang]), navigate: true);
    }

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
                if ($transaksi->hutang != [] && $transaksi->hutang->total != $transaksi->hutang->bayar && $transaksi->hutang->is_hutang == $this->is_hutang) {
                    $hutangs[] = $transaksi->hutang;
                }
            }
        }

        $result = Transaksi::where('status', 'Lainnya')->where('saved', true)->get();
        foreach ($result as $transaksi) {
            if ($transaksi->hutang != [] && $transaksi->hutang->total != $transaksi->hutang->bayar && $transaksi->hutang->is_hutang == $this->is_hutang) {
                $hutangs[] = $transaksi->hutang;
            }
        }

        $paginator = collect($hutangs);

        return view('livewire.hutang.index', [
            'hutang' => $paginator->paginate(10)
        ]);
    }
}
