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
        $dagang =
            JurnalUmum::join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('usahas', 'usahas.id_usaha', '=', 'transaksis.id_usaha')
            ->join('jual_belis', 'transaksis.id_transaksi', '=', 'jual_belis.id_transaksi')
            ->join('jbdagangs', 'jual_belis.id_jualbeli', '=', 'jbdagangs.id_jualbeli')
            ->join('barangs', 'barangs.id_barang', '=', 'jbdagangs.id_barang')
            ->select('usahas.nama')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Penjualan%" THEN jurnal_umums.debit + jurnal_umums.kredit ELSE 0 END) AS penjualan')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Pembelian%" THEN jurnal_umums.debit + jurnal_umums.kredit ELSE 0 END) AS pembelian')
            ->selectRaw('SUM(CASE WHEN akuns.nama LIKE "%Pembelian%" THEN (barangs.harga+barangs.untung)*barangs.stok ELSE 0 END) AS total_jual')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Penjualan%')
            ->orWhere('akuns.nama', 'LIKE', '%Pembelian%')
            ->groupBy('usahas.nama')
            ->get();
        $beban = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->join('usahas', 'akuns.id_usaha', '=', 'usahas.id_usaha')
            ->select('jurnal_umums.id_akun', 'akuns.nama')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Biaya%')
            ->groupBy('jurnal_umums.id_akun', 'akuns.nama')
            ->get();
        // $this->query('Beban', 'Bunga', 'bunga');
        $bunga = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Beban Bunga%')
            ->first();

        // $this->query('Beban', 'Denda', 'denda');
        $denda = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Beban Denda%')
            ->first();
        // $this->query('Beban', 'lain-lainnya', 'lain');
        $lain = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Beban lain-lainnya%')
            ->first();
        // $this->query('Kas', 'Bank', 'bank');
        $bank = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Kas Bank%')
            ->first();
        // $this->query('Kas', 'Bagi Hasil', 'hasil');
        $hasil = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Kas Bagi Hasil%')
            ->first();
        // $this->query('Kas', 'Sumbangan', 'sumbangan');
        $sumbangan = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
            ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
            ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
            ->whereBetween('transaksis.tanggal', [$start, $end])
            ->where('akuns.nama', 'LIKE', '%Kas Sumbangan%')
            ->first();
        // $this->query('', 'Prive', 'prive');
        // $prive = JurnalUmum::join('akuns', 'jurnal_umums.id_akun', '=', 'akuns.id_akun')
        // ->join('transaksis', 'jurnal_umums.id_transaksi', '=', 'transaksis.id_transaksi')
        // ->selectRaw('SUM(jurnal_umums.debit + jurnal_umums.kredit) as total')
        // ->whereBetween('transaksis.tanggal', [$start, $end])
        // ->where('akuns.nama', 'LIKE', '%Kas Bank%')
        // ->first();
        foreach ($jasa as $item) {
            $totaljasa = $totaljasa + $item->total;
        }
        foreach ($dagang as $item) {
            $totaldagang = $totaldagang + $item->penjualan - ($item->pembelian + $item->total_jual);
        }
        foreach ($beban as $item) {
            $totalbeban = $totalbeban + $item->total;
        }
        $labakotor = $totaljasa + $totaldagang + ($bank->total ?? 0 + $hasil->total ?? 0 + $sumbangan->total ?? 0);

        $totalbeban = $totalbeban + $bunga->total ?? 0  + $denda->total ?? 0 + $lain->total ?? 0;
        $lababersih = $labakotor + $totalbeban;



        $modalawal = Modal_Awal::firstOrNew(['Tahun' => $year]);
        $nilaimodalawal = Modal_Awal::where('Tahun', $year - 1)->first();

        if ($modalawal) {
            $modalawal->fill([
                "Nilai" => $lababersih + $nilaimodalawal->Nilai ?? 0
            ])->save();
        }

        info("berhasil");

        return 0;
    }
}
