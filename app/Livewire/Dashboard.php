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
        $hutang = 0;
        $piutang = 0;
        $hutangpiutang = Hutang::selectRaw('hutangs.is_hutang, sum(hutangs.total-hutangs.bayar) AS total')->groupBy('hutangs.is_hutang')->get()->toArray();
        foreach($hutangpiutang as $item) {
            if($item['is_hutang']) {
                $hutang = $item['total'];
            } else {
                $piutang = $item['total'];
            }
        }

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
        // dd($usahajasa);

        $usahas = Usaha::selectRaw('usahas.nama, sum(jual_belis.total) as total')
        ->orderBy('nama')
        ->where('usahas.status', 'Dagang')
        ->where('transaksis.saved', true)
        ->where('transaksis.status', 'Usaha')
        ->join('transaksis', 'transaksis.id_usaha', 'usahas.id_usaha')
        ->join('dagangs', 'transaksis.id_transaksi', 'dagangs.id_transaksi')
        ->join('jual_belis', 'transaksis.id_transaksi', 'jual_belis.id_transaksi')
        ->groupBy(['usahas.nama', 'dagangs.status'])
        ->orderBy('dagangs.status', 'desc')
        ->get()->toArray();

        // dd($usahas);

        $usahadagang = [];
        $tempDagang = false;
        foreach($usahas as $key=>$usaha) {
            if($tempDagang) { continue; }

            try {
                $usaha['nama'] == $usahas[$key+1]['nama'];
                $sameUsaha = true;
            } catch (\Throwable $th) {
                $sameUsaha = false;
            }

            if($sameUsaha) {
                $usahadagang[] = [
                    'nama' => $usaha['nama'],
                    'total' => $usaha['total'] - $usahas[$key+1]['total']
                ];

                $tempDagang = true;
            } else {
                $usahadagang[] = $usaha;

                $tempDagang = false;
            }
        }

        $usahaList = Usaha::orderBy('nama')->get();
        $usaha_data = [];
        $usaha_label = [];

        foreach($usahaList as $item) {
            if($item->status == 'Dagang') {
                $usahasItem = Usaha::selectRaw('sum(jual_belis.total) as total, MONTH(transaksis.tanggal) as month')
                    ->where('usahas.id_usaha', $item->id_usaha)
                    ->where('transaksis.saved', true)
                    ->join('transaksis', 'transaksis.id_usaha', 'usahas.id_usaha')
                    ->join('dagangs', 'transaksis.id_transaksi', 'dagangs.id_transaksi')
                    ->join('jual_belis', 'transaksis.id_transaksi', 'jual_belis.id_transaksi')
                    ->orderBy('transaksis.tanggal', 'desc')
                    ->orderBy('dagangs.status', 'desc')
                    ->groupByRaw('MONTH(transaksis.tanggal), dagangs.status');
            } else {
                $usahasItem = Usaha::selectRaw('sum(jual_belis.total) as total, MONTH(transaksis.tanggal) as month')
                    ->where('usahas.id_usaha', $item->id_usaha)
                    ->where('transaksis.saved', true)
                    ->join('transaksis', 'transaksis.id_usaha', 'usahas.id_usaha')
                    ->join('jual_belis', 'transaksis.id_transaksi', 'jual_belis.id_transaksi')
                    ->orderBy('transaksis.tanggal', 'desc')
                    ->groupByRaw('MONTH(transaksis.tanggal)');
            }

            $dagangsTotal = $usahasItem->get()->toArray();
            // dump($dagangsTotal);

            $tempDagangTotal = [];
            $tempDagang = false;
            foreach($dagangsTotal as $key=>$dagangTotal) {
                if($tempDagang) {
                    $tempDagang = false;
                    continue;
                }

                if(sizeof($dagangsTotal) != $key+1) {
                    if($dagangTotal['month'] == $dagangsTotal[$key+1]['month']) {
                        $tempDagangTotal[] = [
                            'total' => $dagangTotal['total'] - $dagangsTotal[$key+1]['total'],
                            'month' => $dagangTotal['month'],
                        ];

                        $tempDagang = true;
                    } else {
                        $tempDagangTotal[] = $dagangTotal;
                    }
                } else {
                    $tempDagangTotal[] = $dagangTotal;
                }
            }

            $usaha_data[$item->nama] = collect($tempDagangTotal)->pluck('month', 'total')->toArray();
            $usaha_label[$item->nama] = $usahasItem->pluck('month')->toArray();
        }

        $labels = [];
        foreach($usahaList as $item) {
            $labels = array_unique(array_merge($labels, $usaha_label[$item->nama]));
        }
        sort($labels);

        $tempdata = [];
        foreach($labels as $label) {
            foreach($usahaList as $item) {
                $value = 0;

                $result = array_search($label, $usaha_data[$item->nama]);
                if($result != false) {
                    $value = $result;
                }
                $tempdata[$item->nama][] = $value;
            }
        }

        $data = [];
        foreach($tempdata as $key=>$item) {
            $data[] = [
                'name' => $key,
                'data' => $item
            ];
        }

        return view('livewire.dashboard.index', [
            'usaha' => collect(array_merge($usahajasa, $usahadagang))->sort(),
            'hutang' => $hutang,
            'piutang' => $piutang,
            'biaya_jasa' => $biaya[1]['total'] ?? 0,
            'biaya_dagang' => $biaya[0]['total'] ?? 0,
            'biaya_lainnya' => $lainnya[0]['total'] ?? 0,
            'data' => json_encode($data),
            'labels' => $labels,
        ]);
    }
}
