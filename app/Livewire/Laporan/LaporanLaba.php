<?php

namespace App\Livewire\Laporan;

use App\Models\Akun;
use App\Models\JurnalUmum;
use App\Models\Usaha;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LaporanLaba extends Component
{
    public $jenis;
    public $usaha;
    public function mount(string $jenis)
    {
        $this->jenis = $jenis;
    }
    public function render()
    {

        $this->usaha();
        return view('livewire.laporan.laporan-laba');
    }

    public function usaha()
    {
        $query = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->where('akuns.nama', 'LIKE', '%Kas%');

        if ($this->jenis !== 'Gabungan') {
            $query->where('usahas.status', $this->jenis);
        }

        $this->usaha = $query
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
    }
}
