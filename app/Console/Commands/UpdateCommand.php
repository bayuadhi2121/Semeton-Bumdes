<?php

namespace App\Console\Commands;

use App\Models\JurnalUmum;
use App\Models\Modal_Awal;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {



        $totaljasa = 0;
        $totalbeban = 0;
        $totaldagang = 0;

        $labakotor = 0;
        $lababersih = 0;

        $bunga = 0;
        $denda = 0;

        $year = Carbon::now()->year;
        $start = Carbon::createFromDate($year, 1, 1)->startOfDay()->format('Y-m-d');
        $end = Carbon::createFromDate($year, 12, 31)->startOfDay()->format('Y-m-d');

        $jasa = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Kas%')
            ->where('usahas.status', 'Jasa')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
    }
}
