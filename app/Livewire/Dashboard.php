<?php

namespace App\Livewire;

use App\Models\Usaha;
use App\Models\Hutang;
use Livewire\Component;
use App\Models\Transaksi;

class Dashboard extends Component
{
    public function render()
    {
        $hutangpiutang = Hutang::selectRaw('hutangs.is_hutang, sum(hutangs.total-hutangs.bayar) AS total')->groupBy('hutangs.is_hutang')->orderBy('is_hutang')->get()->toArray();

        $biaya = Transaksi::selectRaw('usahas.status, sum(jual_belis.total) AS total')
        ->where('saved', true)
        ->where('transaksis.status', 'Beban')
        ->join('usahas', 'usahas.id_usaha', 'transaksis.id_usaha')
        ->join('jual_belis', 'transaksis.id_transaksi', 'jual_belis.id_transaksi')
        ->groupBy('usahas.status')
        ->orderBy('usahas.status')
        ->get()->toArray();

        $lainnya = Transaksi::selectRaw('sum(jurnal_umums.debit) AS total')
        ->where('saved', true)
        ->where('transaksis.status', 'Lainnya')
        ->join('jurnal_umums', 'jurnal_umums.id_transaksi', 'transaksis.id_transaksi')
        ->get()->toArray();

        $usahajasa = Usaha::selectRaw('nama')->orderBy('nama')->where('status', 'Jasa')->withSum('totaljualbeli AS total', 'total')->get()->toArray();
        $usahadagang = [];

        $usahas = Usaha::
        selectRaw('usahas.nama, sum(jual_belis.total) as total')
        ->orderBy('nama')
        ->where('usahas.status', 'Dagang')
        ->where('transaksis.saved', true)
        ->where('transaksis.status', 'Usaha')
        ->join('transaksis', 'transaksis.id_usaha', 'usahas.id_usaha')
        ->join('dagangs', 'transaksis.id_transaksi', 'dagangs.id_transaksi')
        ->join('jual_belis', 'transaksis.id_transaksi', 'jual_belis.id_transaksi')
        ->groupBy(['usahas.nama', 'dagangs.status'])
        ->orderBy('dagangs.status')
        ->get()->toArray();

        // dd($usahas);

        foreach($usahas as $key=>$usaha) {
            if($key % 2 == 1) continue;
            $usahadagang[] = [
                'nama' => $usaha['nama'],
                'total' => $usaha['total'] - $usahas[$key+1]['total']
            ];
        }

        return view('livewire.dashboard.index', [
            'usaha' => collect(array_merge($usahajasa, $usahadagang))->sort(),
            'hutang' => $hutangpiutang[1]['total'] ?? 0,
            'piutang' => $hutangpiutang[0]['total'] ?? 0,
            'biaya_jasa' => $biaya[1]['total'] ?? 0,
            'biaya_dagang' => $biaya[0]['total'] ?? 0,
            'biaya_lainnya' => $lainnya[0]['total'] ?? 0
        ]);
    }
}
