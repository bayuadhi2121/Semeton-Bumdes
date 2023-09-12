<?php

namespace App\Livewire;

use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\Transaksi as ModelsTransaksi;

class Transaksi extends Component
{
    use WithPagination;

    public $search = '';
    public $nama, $status;

    #[Url()]
    public $usaha;

    #[On('page-refresh', '$refresh')]

    public function mount()
    {
        $usaha = Usaha::where('id_usaha', $this->usaha)->get(['nama', 'status'])->first();
        $this->nama = $usaha->nama;
        $this->status = $usaha->status;
    }

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.transaksi.index', [
            'transaksi' => ModelsTransaksi::where('id_usaha', $this->usaha)->paginate(10)
        ]);
    }
}
