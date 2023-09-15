<?php

namespace App\Livewire;

use App\Models\Usaha;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Transaksi as ModelsTransaksi;

class Transaksi extends Component
{
    use WithPagination;

    public $search = '';
    public $nama, $status;

    #[Url()]
    public $usaha;

    public function mount()
    {
        try {
            $usaha = Usaha::where('id_usaha', $this->usaha)->get(['nama', 'status'])->first();
            $this->nama = $usaha->nama;
            $this->status = $usaha->status;
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    public function resetSearch()
    {
        $this->reset('search');
    }

    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.transaksi.index', [
            'transaksi' => ModelsTransaksi::where('keterangan', 'like', '%'.$this->search ?? ''.'%')->where('id_usaha', $this->usaha)->paginate(10)
        ]);
    }
}
