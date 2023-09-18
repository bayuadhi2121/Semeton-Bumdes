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
    public $nama, $mode;

    #[Url()]
    public $usaha, $status;

    public function mount()
    {
        try {
            switch ($this->status) {
                case 'Usaha':
                    $usaha = Usaha::where('id_usaha', $this->usaha)->get(['nama', 'status'])->first();
                    $this->nama = $usaha->nama;
                    $this->mode = $usaha->status;
                    break;

                case 'Lainnya':
                    $this->nama = $this->status;
                    $this->mode = $this->status;
                    break;

                case 'Beban':
                    $usaha = Usaha::where('id_usaha', $this->usaha)->get(['nama'])->first();
                    $this->nama = 'Beban '.$usaha->nama;
                    $this->mode = $this->status;
                    break;

                default:
                    abort(404);
                    break;
            }
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
            'transaksi' => ModelsTransaksi::where('id_usaha', $this->usaha)->where('status', $this->status)->where('keterangan', 'like', '%'. $this->search.'%')->paginate(10)
        ]);
    }
}
