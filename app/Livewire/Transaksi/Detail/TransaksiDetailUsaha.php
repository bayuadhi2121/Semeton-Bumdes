<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Akun;
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
    public $id_transaksi, $status;
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

        foreach ($transaksi->usaha->akun as $item) {
            $id_akun = $item->id_akun;
            $record = [];
            //hutang
            if ($this->dibayarkan == 0) {
                //jual
                if ($transaksi->dagang->status = 'Jual') {
                    if (strpos($item->nama, 'Penjualan') !== false) {
                        $record = [
                            'kredit' => $this->total,
                            'debit' => 0,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    } elseif (strpos($item->nama, 'Piutang') !== false) {
                        $record = [
                            'kredit' => 0,
                            'debit' => $this->sisa,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                } else {
                    if (strpos($item->nama, 'Pembelian') !== false) {
                        $record = [
                            'kredit' => 0,
                            'debit' => $this->total,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    } elseif (strpos($item->nama, 'Hutang') !== false) {
                        $record = [
                            'kredit' => $this->total,
                            'debit' => 0,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                }
            } else {

                if ($transaksi->dagang->status = 'Jual') {
                    if (strpos($item->nama, 'Penjualan') !== false) {
                        $record = [
                            'kredit' => $this->total,
                            'debit' => 0,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    } elseif (strpos($item->nama, 'Kas') !== false) {
                        $record = [
                            'kredit' => 0,
                            'debit' => $this->dibayarkan,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                } else {
                    if (strpos($item->nama, 'Pembelian') !== false) {
                        $record = [
                            'kredit' => 0,
                            'debit' => $this->total,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    } elseif (strpos($item->nama, 'Kas') !== false) {
                        $record = [
                            'kredit' => $this->dibayarkan,
                            'debit' => 0,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                }
            }

            if ($this->sisa != 0) {
                if ($transaksi->dagang->status == 'Jual') {
                    if (strpos($item->nama, 'Piutang') !== false) {
                        $record = [
                            'kredit' => 0,
                            'debit' => $this->sisa,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                } else {
                    if (strpos($item->nama, 'Hutang') !== false) {
                        $record = [
                            'kredit' => $this->sisa,
                            'debit' => 0,
                            'id_akun' => $id_akun,
                            'id_transaksi' => $this->id_transaksi
                        ];
                    }
                }
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
    public function storeJasa()
    {
        $this->validate();
        $transaksi = Transaksi::find($this->id_transaksi);

        foreach ($transaksi->usaha->akun as $item) {
            $id_akun = $item->id_akun;
            $record = [];
            if ($this->dibayarkan != 0) {
                if (strpos($item->nama, 'Kas') !== false) {
                    $record = [
                        'kredit' => 0,
                        'debit' => $this->dibayarkan,
                        'id_akun' => $id_akun,
                        'id_transaksi' => $this->id_transaksi
                    ];
                } elseif (strpos($item->nama, 'Pendapatan') !== false) {
                    $record = [
                        'kredit' => $this->total,
                        'debit' => 0,
                        'id_akun' => $id_akun,
                        'id_transaksi' => $this->id_transaksi
                    ];
                }
            } else {
                if ($this->sisa != 0 && strpos($item->nama, 'Piutang') !== false) {
                    $record = [
                        'kredit' => 0,
                        'debit' => $this->sisa,
                        'id_akun' => $id_akun,
                        'id_transaksi' => $this->id_transaksi
                    ];
                } elseif (strpos($item->nama, 'Pendapatan') !== false) {
                    $record = [
                        'kredit' => $this->total,
                        'debit' => 0,
                        'id_akun' => $id_akun,
                        'id_transaksi' => $this->id_transaksi
                    ];
                }
            }

            if ($this->sisa != 0 && strpos($item->nama, 'Piutang') !== false) {
                $record = [
                    'kredit' => 0,
                    'debit' => $this->sisa,
                    'id_akun' => $id_akun,
                    'id_transaksi' => $this->id_transaksi
                ];
            }
            try {
                JurnalUmum::create($record);
            } catch (Exception $e) {
            }
        }
        $transaksi->update([
            'saved' => true
        ]);


        // if()
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
            'jualbeli' => JualBeli::where('id_transaksi', $this->id_transaksi)->paginate(10),
            'transaksi' => Transaksi::where('id_transaksi', $this->id_transaksi)->first()
        ]);
    }
}
