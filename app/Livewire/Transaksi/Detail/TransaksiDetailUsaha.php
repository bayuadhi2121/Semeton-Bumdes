<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Barang;
use App\Models\Hutang;
use App\Models\JualBeli;
use App\Models\JurnalUmum;
use App\Models\Transaksi;
use Exception;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TransaksiDetailUsaha extends Component
{
    public $id_transaksi, $status, $statusDagang;
    public $total = 0, $hpp = 0;
    public $dibayarkan = 0;
    public $sisa = 0;
    use WithPagination;
    public function rules()
    {
        return [
            'dibayarkan' => 'required|numeric|max:' . $this->total,
        ];
    }
    public function mount(Transaksi $transaksi)
    {
        $this->id_transaksi = $transaksi->id_transaksi;
        if ($transaksi->dagang->status ?? null) {
            $this->status = 'Barang';
            $this->statusDagang = $transaksi->dagang->status;
        } elseif ($transaksi->status == 'Lainnya') {
            $this->status = $transaksi->status;
        } else {
            $this->status = 'Jasa';
        }
    }
    #[On('refresh-data')]
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function calculateTotal()
    {
        $items = JualBeli::where('id_transaksi', $this->id_transaksi)->get();
        $this->total = $items->sum(function ($item) {
            return $item->kuantitas * $item->harga;
        });

        if ($this->statusDagang == 'Jual') {
            $this->hpp = $items->sum(function ($item) {
                return $item->kuantitas * $item->barang->harga;
            });
        }
    }
    public function action()
    {
        if ($this->status == 'Jasa') {
            $this->storeJasa();
        } else {
            $this->storeDagang();
        }
    }
    //
    public function cekBarang()
    {
        $items = JualBeli::where('id_transaksi', $this->id_transaksi)->get();
        foreach ($items as $jb) {

            if ($this->statusDagang == 'Beli') {
                $stok = $jb->jbdagang->barang->stok + $jb->kuantitas;
            } else if ($this->statusDagang == 'Jual') {
                if ($jb->kuantitas > $jb->jbdagang->barang->stok) {
                    $this->addError('kuantitas', 'Stok barang ' . $jb->jbdagang->barang->nama . ' tersisa ' . $jb->jbdagang->barang->stok);
                    return;
                }
                $stok = $jb->jbdagang->barang->stok - $jb->kuantitas;
            }

            if ($this->statusDagang == 'Beli') {
                $jb->jbdagang->barang->update([
                    'stok' => $stok,
                    'harga' => $jb->harga
                ]);
            } else {
                $jb->jbdagang->barang->update([
                    'stok' => $stok
                ]);
            }
        }
    }
    public function storeDagang()
    {
        $this->validate();
        $this->cekBarang();
        if ($this->getErrorBag()->any()) {
            return;
        }
        $transaksi = Transaksi::find($this->id_transaksi);
        $sisa = abs($this->sisa);

        // list akun usaha dagang
        $id_kas = "";
        $id_penjualan = "";
        $id_hpp = "";
        $id_pbd = "";
        $id_hutang = "";
        $id_piutang = "";

        // ambil id list akun
        foreach ($transaksi->usaha->akun as $item) {
            if (strpos($item->nama, 'Penjualan ' . $item->usaha->nama) === 0) {
                $id_penjualan = $item->id_akun;
            } elseif (strpos($item->nama, 'Kas ' . $item->usaha->nama) === 0) {
                $id_kas = $item->id_akun;
            } elseif (strpos($item->nama, 'Harga Pokok Penjualan ' . $item->usaha->nama) === 0) {
                $id_hpp = $item->id_akun;
            } elseif (strpos($item->nama, 'Persediaan Barang Dagang ' . $item->usaha->nama) === 0) {
                $id_pbd = $item->id_akun;
            } elseif (strpos($item->nama, 'Hutang ' . $item->usaha->nama) === 0) {
                $id_hutang = $item->id_akun;
            } elseif (strpos($item->nama, 'Piutang ' . $item->usaha->nama) === 0) {
                $id_piutang = $item->id_akun;
            }
        }

        if ($this->dibayarkan == 0) {
            // full piutang (jual)
            if ($transaksi->dagang->status == 'Jual') {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => 0, 'kredit' => $this->total, 'id_akun' => $id_penjualan],
                    ['debit' => $this->hpp, 'kredit' => 0, 'id_akun' => $id_hpp],
                    ['debit' => 0, 'kredit' => $this->hpp, 'id_akun' => $id_pbd],
                    ['debit' => $sisa, 'kredit' => 0, 'id_akun' => $id_piutang],
                ]);
            }
            // full hutang (beli)
            else {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => $this->total, 'kredit' => 0, 'id_akun' => $id_pbd],
                    ['debit' => 0, 'kredit' => $sisa, 'id_akun' => $id_hutang],
                ]);
            }
        } elseif ($this->dibayarkan != 0 && $this->sisa != 0) {
            // bayar separuh (jual)
            if ($transaksi->dagang->status == 'Jual') {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => $this->dibayarkan, 'kredit' => 0, 'id_akun' => $id_kas],
                    ['debit' => 0, 'kredit' => $this->total, 'id_akun' => $id_penjualan],
                    ['debit' => $this->hpp, 'kredit' => 0, 'id_akun' => $id_hpp],
                    ['debit' => 0, 'kredit' => $this->hpp, 'id_akun' => $id_pbd],
                    ['debit' => $sisa, 'kredit' => 0, 'id_akun' => $id_piutang],
                ]);
            }
            // bayar separuh (beli)
            else {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => 0, 'kredit' => $this->dibayarkan, 'id_akun' => $id_kas],
                    ['debit' => $this->total, 'kredit' => 0, 'id_akun' => $id_pbd],
                    ['debit' => 0, 'kredit' => $sisa, 'id_akun' => $id_hutang],
                ]);
            }
        } else {
            // bayar full (jual)
            if ($transaksi->dagang->status == 'Jual') {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => $this->dibayarkan, 'kredit' => 0, 'id_akun' => $id_kas],
                    ['debit' => 0, 'kredit' => $this->total, 'id_akun' => $id_penjualan],
                    ['debit' => $this->hpp, 'kredit' => 0, 'id_akun' => $id_hpp],
                    ['debit' => 0, 'kredit' => $this->hpp, 'id_akun' => $id_pbd],
                ]);
            }
            // bayar full (beli)
            else {
                $transaksi->jurnalumum()->CreateMany([
                    ['debit' => 0, 'kredit' => $this->dibayarkan, 'id_akun' => $id_kas],
                    ['debit' => $this->total, 'kredit' => 0, 'id_akun' => $id_pbd],
                ]);
            }
        }

        $this->hutang($transaksi);
        $transaksi->update([
            'saved' => true
        ]);
    }
    public function hutang(Transaksi $transaksi)
    {
        $is_hutang = true;

        if ($this->sisa != 0) {
            if ($transaksi->dagang != null && $transaksi->dagang->status == 'Jual') {
                $is_hutang = false;
            }

            $transaksi->hutang()->create([
                'is_hutang' => $is_hutang,
                'total' => abs($this->sisa)
            ]);
        }
    }

    public function storeJasa()
    {
        $this->validate();
        $transaksi = Transaksi::find($this->id_transaksi);
        $sisa = abs($this->sisa);
        foreach ($transaksi->usaha->akun as $item) {
            $id_akun = $item->id_akun;
            $record = [
                'kredit' => 0,
                'debit' => 0,
                'id_akun' => '',
                'id_transaksi' => $this->id_transaksi
            ];
            if ($this->dibayarkan != 0) {
                if (strpos($item->nama, 'Kas ' . $item->usaha->nama) !== false) {
                    $record['debit'] = $this->dibayarkan;
                    $record['id_akun'] = $id_akun;
                } elseif (strpos($item->nama, 'Pendapatan ' . $item->usaha->nama) !== false) {
                    $record['kredit'] = $this->total;
                    $record['id_akun'] = $id_akun;
                }
            } else {
                if ($this->sisa != 0 && strpos($item->nama, 'Piutang ' . $item->usaha->nama) !== false) {
                    $record['debit'] = $sisa;
                    $record['id_akun'] = $id_akun;
                } elseif (strpos($item->nama, 'Pendapatan ' . $item->usaha->nama) !== false) {
                    $record['kredit'] = $this->total;
                    $record['id_akun'] = $id_akun;
                }
            }

            if ($this->sisa != 0 && strpos($item->nama, 'Piutang ' . $item->usaha->nama) !== false) {
                $record['debit'] = $sisa;
                $record['id_akun'] = $id_akun;
            }
            try {
                JurnalUmum::create($record);
            } catch (Exception $e) {
            }
        }

        $this->hutang($transaksi);
        $transaksi->update([
            'saved' => true
        ]);
    }
    public function updatedDibayarkan()
    {
        $this->sisa = (int)$this->total - (int)$this->dibayarkan;
    }
    public function render()
    {
        $this->calculateTotal();

        return view('livewire.transaksi.detail.usaha', [
            'jualbeli' => JualBeli::where('id_transaksi', $this->id_transaksi)->latest()->paginate(10),
            'transaksi' => Transaksi::where('id_transaksi', $this->id_transaksi)->first()
        ]);
    }
}
