<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Akun;
use App\Models\Barang;
use App\Models\JualBeli;
use App\Models\JurnalUmum;
use App\Models\Transaksi;
use App\Models\Usaha;
use Exception;
use Illuminate\Notifications\Action;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TransaksiDetailUsaha extends Component
{
    public $id_transaksi, $status, $statusDagang;
    public $total;
    public $dibayarkan;
    public $sisa;
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
    }
    public function action()
    {
        if ($this->status == 'Jasa') {
            $this->storeJasa();
        } else {
            $this->storeDagang();
        }
    }
    public function storeDagang()
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
            //hutang
            if ($this->dibayarkan == 0) {
                //jual
                if ($transaksi->dagang->status = 'Jual') {
                    if (strpos($item->nama, 'Penjualan') !== false) {
                        $record['kredit'] = $this->total;
                        $record['id_akun'] = $id_akun;
                    } elseif (strpos($item->nama, 'Piutang') !== false) {
                        $record['debit'] = $sisa;
                        $record['id_akun'] = $id_akun;
                    }
                } else {
                    if (strpos($item->nama, 'Pembelian') !== false) {
                        $record['debit'] = $this->total;
                        $record['id_akun'] = $id_akun;
                    } elseif (strpos($item->nama, 'Hutang') !== false) {
                        $record['kredit'] = $this->total;
                        $record['id_akun'] = $id_akun;
                    }
                }
            } else {

                if ($transaksi->dagang->status = 'Jual') {
                    if (strpos($item->nama, 'Penjualan') !== false) {
                        $record['kredit'] = $this->total;
                        $record['id_akun'] = $id_akun;
                    } elseif (strpos($item->nama, 'Kas') !== false) {
                        $record['debit'] = $this->dibayarkan;
                        $record['id_akun'] = $id_akun;
                    }
                } else {
                    if (strpos($item->nama, 'Pembelian') !== false) {
                        $record['debit'] = $this->total;
                        $record['id_akun'] = $id_akun;
                    } elseif (strpos($item->nama, 'Kas') !== false) {
                        $record['kredit'] = $this->dibayarkan;
                        $record['id_akun'] = $id_akun;
                    }
                }
            }

            if ($this->sisa != 0) {
                if ($transaksi->dagang->status == 'Jual') {
                    if (strpos($item->nama, 'Piutang') !== false) {
                        $record['debit'] = $sisa;
                        $record['id_akun'] = $id_akun;
                    }
                } else {
                    if (strpos($item->nama, 'Hutang') !== false) {
                        $record['kredit'] = $sisa;
                        $record['id_akun'] = $id_akun;
                    }
                }
            }
            try {

                JurnalUmum::create($record);
            } catch (Exception $e) {
            }
        }

        $this->cekBarang();
        $transaksi->update([
            'saved' => true
        ]);
    }
    public function cekBarang()
    {

        $jb = JualBeli::where('id_transaksi', $this->id_transaksi)->get();

        foreach ($jb as $item) {
            $qty = $item->kuantitas;
            $barang = Barang::find($item->jbdagang->barang->id_barang);
            if ($this->statusDagang == 'Jual') {
                $barang->update([
                    'stok' => $barang->stok - $qty
                ]);
            } else {
                $barang->update([
                    'stok' => $barang->stok + $qty
                ]);
            }
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
                if (strpos($item->nama, 'Kas') !== false) {
                    $record['debit'] = $this->dibayarkan;
                    $record['id_akun'] = $id_akun;
                } elseif (strpos($item->nama, 'Pendapatan') !== false) {
                    $record['kredit'] = $this->total;
                    $record['id_akun'] = $id_akun;
                }
            } else {
                if ($this->sisa != 0 && strpos($item->nama, 'Piutang') !== false) {
                    $record['debit'] = $sisa;
                    $record['id_akun'] = $id_akun;
                } elseif (strpos($item->nama, 'Pendapatan') !== false) {
                    $record['kredit'] = $this->total;
                    $record['id_akun'] = $id_akun;
                }
            }

            if ($this->sisa != 0 && strpos($item->nama, 'Piutang') !== false) {
                $record['debit'] = $sisa;
                $record['id_akun'] = $id_akun;
            }
            try {
                JurnalUmum::create($record);
            } catch (Exception $e) {
            }
        }
        $transaksi->update([
            'saved' => true
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName); // Real-time validation

        if (in_array($propertyName, ['dibayarkan', 'sisa'])) {
            $this->sisa = (int)$this->dibayarkan - (int)$this->total;
        }
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
