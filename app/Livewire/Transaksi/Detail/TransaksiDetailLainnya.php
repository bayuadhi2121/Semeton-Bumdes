<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Akun;
use Livewire\Component;
use App\Models\Transaksi;

class TransaksiDetailLainnya extends Component
{
    public $first = true, $showList = [], $search = '', $akun, $status = [], $totalDebit, $totalKredit;
    public Transaksi $transaksi;
    public $jumum = [], $nama = [];

    public function rules()
    {
        return [
            'jumum' => 'required|min:1',
            'jumum.*.id_akun' => 'required|min:1|exists:akuns,id_akun',
        ];
    }

    public function mount(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;

        if($transaksi->saved) {
            foreach ($transaksi->jurnalumum as $item) {
                $this->addDetailData($item->id_akun, $item->akun->nama, $item->debit, $item->kredit, true);
            }
        }
    }

    public function addDetail()
    {
        $this->addDetailData();

        if($this->first) {
            $this->addDetailData();
            $this->first = false;
        }
    }

    private function addDetailData($id = '', $nama = '', $debit = 0, $kredit = 0, $status = false)
    {
        $this->showList[] = false;
        $this->status[] = $status;
        $this->nama[] = $nama;
        $this->jumum[] = [
            'id_akun' => $id,
            'debit' => $debit,
            'kredit' => $kredit
        ];
    }

    public function deleteDetail($jumum)
    {
        if(sizeof($this->jumum) > 2) {
            array_splice($this->jumum, $jumum, 1);
            array_splice($this->nama, $jumum, 1);
            array_splice($this->showList, $jumum, 1);
            array_splice($this->status, $jumum, 1);
        }
    }

    public function updatedNama($value, $key)
    {
        $in = explode('.', $key);
        $namaUc = ucwords($value);
        if ($this->akun->contains('nama', $namaUc)) {
            $this->jumum[$in[0]]['id_akun'] = $this->akun->where('nama', $namaUc)->first()->id_akun;
            $this->status[$in[0]] = true;
        } else if ($this->nama[$in[0]] != '') {
            $this->jumum[$in[0]]['id_akun'] = 'zxcvbnm,./';
            $this->status[$in[0]] = false;
        } else {
            $this->jumum[$in[0]]['id_akun'] = '';
            $this->status[$in[0]] = false;
        }

        $this->search = $this->nama[$in[0]];
    }

    public function createAkun($index)
    {
        $nama = ucwords($this->nama[$index]);
        $akun = Akun::create(['nama' => $nama]);
        $this->setAkun($index, $akun->id_akun, $nama);
    }

    public function setAkun($index, $akun, $nama)
    {
        $this->jumum[$index]['id_akun'] = $akun;
        $this->nama[$index] = $nama;
        $this->status[$index] = true;
    }

    public function showAkun($index)
    {
        $this->showList[$index] = true;
    }

    public function closeAkun($index)
    {
        $this->showList[$index] = false;
    }

    public function save()
    {
        $this->validate();

        $hutang = [];
        foreach ($this->jumum as $item) {
            $result = Akun::where('id_akun', $item['id_akun'])->first();
            $akun = explode(" ", $result->nama);

            if($akun[0] == "Piutang") {
                $hutang[] = [
                    'bayar' => 0,
                    'total' => $item['kredit'] + $item['debit'],
                    'is_hutang' => false
                ];
            }

            if($akun[0] == "Hutang") {
                $hutang[] = [
                    'bayar' => 0,
                    'total' => $item['kredit'] + $item['debit'],
                    'is_hutang' => true
                ];
            }
        }

        if(sizeof($hutang) > 0) {
            $this->transaksi->hutang()->createMany($hutang);
        }

        $this->transaksi->jurnalumum()->createMany($this->jumum);

        $this->transaksi->update([
            'saved' => true
        ]);
    }

    public function render()
    {
        $this->akun = Akun::where('nama', 'like', '%' . $this->search . '%')->inRandomOrder()->orderBy('nama')->get();
        $this->totalDebit = array_sum(array_column($this->jumum, 'debit'));
        $this->totalKredit =  array_sum(array_column($this->jumum, 'kredit'));
        $balance = ($this->totalDebit == $this->totalKredit && $this->totalDebit != 0 && $this->totalKredit != 0);

        return view('livewire.transaksi.detail.lainnya.index', [
            'akuns' => Akun::where('nama', 'like', '%' . $this->search . '%')->inRandomOrder()->limit(3)->orderBy('nama')->get(),
            'balance' => $balance
        ]);
    }
}
