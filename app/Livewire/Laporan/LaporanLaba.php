<?php

namespace App\Livewire\Laporan;

use App\Models\Akun;
use App\Models\Usaha;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanLaba extends Component
{
    public $jenis;
    public $akun = [], $usaha;
    public function mount(string $jenis)
    {
        $this->jenis = $jenis;
    }
    #[Layout('layouts.laporan')]
    public function render()
    {
        $this->setUsaha();
        return view('livewire.laporan.laporan-laba', [
            'usaha' => $this->usaha
        ]);
    }

    public function setUsaha()
    {
        $this->usaha = Usaha::where('status', $this->jenis)->get();
    }
}
