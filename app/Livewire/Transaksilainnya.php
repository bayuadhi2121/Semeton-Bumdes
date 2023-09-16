<?php

namespace App\Livewire;

use App\Models\Transaksi;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Transaksilainnya extends Component
{
    use WithPagination;
    public $search = '';

    // refresh halaman jika page-refresh dipanggil
    #[On('page-refresh', '$refresh')]

    // hapus value dari search input
    public function resetSearch()
    {
        $this->reset('search');
    }

    // reset halaman jika terjadi update data pada search input
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.transaksilainnya.index', [
            'transaksi' => Transaksi::where('keterangan', 'like', '%' . $this->search ?? '' . '%')->where('status', 'lainnya')->paginate(10)
        ]);
    }
}
