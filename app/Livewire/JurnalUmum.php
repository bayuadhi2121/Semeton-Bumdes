<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class JurnalUmum extends Component
{
    public function render()
    {
        $result = DB::table('jurnal_umums')
            ->join('akuns', 'akuns.id_akun', '=', 'jurnal_umums.id_akun')
            ->join('transaksis', 'transaksis.id_transaksi', '=', 'jurnal_umums.id_transaksi')
            ->leftjoin('usahas', 'usahas.id_usaha', '=', 'transaksis.id_usaha');

        if (Auth::user()->status == 'Bendahara') {
            $result->where('transaksis.status', 'Lainnya');
        } elseif (Auth::user()->status == 'Akuntan') {
            $result->where('usahas.id_person', Auth::user()->id_person);
        }

        $result = $result->select('akuns.*', 'jurnal_umums.*')->orderBy('jurnal_umums.updated_at', 'desc')->get();

        return view('livewire.jurnal-umum.jurnal-umum', [
            'jurnal' => $result
        ]);
    }
}
