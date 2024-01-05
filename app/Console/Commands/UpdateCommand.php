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
    }
}
