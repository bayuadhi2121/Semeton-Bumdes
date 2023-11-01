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
            // ->join('usahas', 'usahas.id_usaha', '=', 'transaksis.id_usaha')
            ->where('usahas.id_person', Auth::user()->id_person)
            ->select('akuns.*', 'jurnal_umums.*')
            ->get();
        // dd($result);
        return view('livewire.jurnal-umum.jurnal-umum', [
            'jurnal' => $result
        ]);
    }
}
