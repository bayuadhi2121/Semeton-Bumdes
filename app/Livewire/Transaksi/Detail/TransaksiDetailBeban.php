<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Akun;
use Livewire\Component;
use App\Models\JualBeli;
use App\Models\Transaksi;
use Livewire\Attributes\On;

class TransaksiDetailBeban extends Component
{
    public Transaksi $transaksi;
    public $namaUsaha;
    public $total = 0, $bayar = 0, $sisa = 0;

    public function mount(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
        $this->namaUsaha = $transaksi->usaha->nama;
    }

    public function updatedBayar()
    {
        // update view (sisa bayar) jika terjadi perubahan nilai pada input dibayarkan
        $this->render();
    }

    private function updatePembayaran()
    {
        // hitung total dan sisa setiap refresh tampilan
        $this->total = $this->transaksi->jualbeli->sum('total') ?? 0;
        $this->sisa = $this->total - ($this->bayar == '' ? 0 : $this->bayar);

        // cek jika total bernilai lebih kecil dari bayar, maka nilai bayar diubah menjadi sama dengan total
        if($this->total < $this->bayar) {
            $this->bayar = $this->total;
        }
    }

    public function saveTransaksi()
    {
        // ambil data terkati id_akun dari beban yang dipilih dan jumlah totalnya
        $biayas = JualBeli::selectRaw('jenis_biayas.id_akun, sum(jual_belis.total) AS total')
        ->where('id_transaksi', $this->transaksi->id_transaksi)
        ->join('bebans', 'jual_belis.id_jualbeli', '=', 'bebans.id_jualbeli')
        ->join('jenis_biayas', 'bebans.id_jbiaya', '=', 'jenis_biayas.id_jbiaya')
        ->groupBy('jenis_biayas.id_akun')
        ->get();

        // ambil id akun yang berpengaruh pada transaksi beban di usaha yang berkaitan
        $akun = Akun::where('id_usaha', $this->transaksi->id_usaha)->pluck('id_akun', 'nama')->toArray();
        $idKas = $akun['Kas ' . $this->namaUsaha];
        $idHutang = $akun['Hutang ' . $this->namaUsaha];

        $jumum = [];

        // cek apakah dibayar atau tidak
        if($this->bayar > 0) {
            $jumum[] = [
                'kredit' => $this->bayar,
                'debit' => 0,
                'id_akun' => $idKas
            ];
        }

        // cek apakah hutang atau tidak
        if($this->sisa > 0) {
            $jumum[] = [
                'kredit' => $this->sisa,
                'debit' => 0,
                'id_akun' => $idHutang
            ];

            // tambah data hutang
            $this->transaksi->hutang()->create([
                'bayar' => 0,
                'total' => $this->sisa
            ]);
        }

        // masukkan beban
        foreach($biayas as $biaya) {
            $jumum[] = [
                'kredit' => 0,
                'debit' => $biaya->total,
                'id_akun' => $biaya->id_akun
            ];
        }

        // store data ke jurnal umum
        $this->transaksi->jurnalumum()->CreateMany($jumum);

        // tandai transaksi sudah disimpan
        $this->transaksi->update([
            'saved' => true
        ]);
    }

    #[On('refresh-data')]
    public function render()
    {
        $this->updatePembayaran();

        return view('livewire.transaksi.detail.beban.index', [
            'jualbeli' => JualBeli::where('id_transaksi', $this->transaksi->id_transaksi)->get() // ambil semua data jual beli pada transaksi yang ditentukan
        ]);
    }
}
