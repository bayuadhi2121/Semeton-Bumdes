<?php

namespace App\Livewire\Transaksi\Detail;

use App\Models\Barang;
use App\Models\Jbdagang;
use App\Models\Jbjasa;
use App\Models\JenisPendapatan;
use App\Models\JualBeli;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;


class AddEditModal extends Component
{
    public $status, $statusDagang, $id_transaksi, $id_jpendapatan, $id_barang, $id_jualbeli;
    public $show, $showList, $title, $mode, $search = '';
    public $harga, $jumlah, $nama, $barang;
    public Collection $dropdown;
    public function rules()
    {
        $rules = [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ];

        if ($this->barang && $this->statusDagang == 'Jual') {
            $rules['jumlah'] .= '|max:' . $this->barang->stok;
        }

        return $rules;
    }
    #[On('add-modal')]
    public function addModal()
    {
        $this->openModal('store', 'Tambah');
    }
    public function mount(Transaksi $transaksi, $status)
    {
        $this->show = false;
        $this->showList = false;
        $this->status = $status;
        if ($transaksi->usaha->status == 'Dagang') {
            $this->statusDagang = $transaksi->dagang->status;
        }
        $this->id_transaksi = $transaksi->id_transaksi;
    }
    public function showPerson()
    {
        $this->showList = true;
    }
    public function setPerson($id_jpendapatan, $id_barang, $nama_person)
    {
        $this->id_jpendapatan = $id_jpendapatan;
        $this->id_barang = $id_barang;
        $this->barang = Barang::where('id_barang', $id_barang)->first();
        $this->search = $nama_person;
        $this->nama = $this->search;

        if ($this->statusDagang == 'Jual') {
            $this->harga = $this->barang->harga + $this->barang->untung;
        }
    }

    public function closePerson()
    {
        $this->showList = false;
    }

    public function store()
    {
        $this->validate();
        $jb = JualBeli::create([
            'id_transaksi' => $this->id_transaksi,
            'harga' => $this->harga,
            'kuantitas' => $this->jumlah,
            'total' => $this->harga * $this->jumlah
        ]);
        if ($this->status == 'Jasa') {

            Jbjasa::create([
                'id_jualbeli' => $jb->id_jualbeli,
                'id_jpendapatan' => $this->id_jpendapatan,

            ]);
        } else {
            Jbdagang::create([
                'id_barang' => $this->id_barang,
                'id_jualbeli' => $jb->id_jualbeli
            ]);
        }

        $this->closeModal();
        $this->dispatch('refresh-data');
    }

    public function update()
    {
        $this->validate();
        $jb = JualBeli::where('id_jualbeli', $this->id_jualbeli)->first();
        $jb->update([
            'harga' => $this->harga,
            'kuantitas' => $this->jumlah,
            'total' => $this->harga * $this->jumlah
        ]);
        if ($this->status == 'Jasa') {
            Jbjasa::where('id_jualbeli', $jb->id_jualbeli)->update([
                'id_jpendapatan' => $this->id_jpendapatan
            ]);
        } else {
            Jbdagang::where('id_jualbeli', $jb->id_jualbeli)->update([
                'id_barang' => $this->id_barang
            ]);
        }
        $this->closeModal();
        $this->dispatch('refresh-data');
    }
    #[On('edit-modal')]
    public function editModal(JualBeli $jualbeli, $status)
    {
        if ($status == 'Jasa') {
            $this->search = $jualbeli->jbjasa->jenispendapatan->nama;
            $this->id_jpendapatan = $jualbeli->jbjasa->id_jpendapatan;
        } else {
            $this->search = $jualbeli->jbdagang->barang->nama;
            $this->id_barang = $jualbeli->jbdagang->id_barang;
        }
        $this->nama = $this->search;
        $this->id_transaksi = $jualbeli->id_transaksi;
        $this->id_jualbeli = $jualbeli->id_jualbeli;
        $this->harga = $jualbeli->harga;
        $this->jumlah = $jualbeli->kuantitas;
        $this->openModal('update', 'Edit');
    }
    private function openModal($mode, $title)
    {
        $this->show = true;
        $this->mode = $mode;
        $this->title = $title;
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->resetExcept('status', 'id_transaksi');
        $this->resetValidation();
    }
    public function render()
    {
        if ($this->status == 'Jasa') {
            $id_usaha = Transaksi::find($this->id_transaksi);
            $this->dropdown = JenisPendapatan::where('nama', 'like', '%' . $this->search . '%')->where('id_usaha', $id_usaha->id_usaha)->inRandomOrder()->limit(5)->orderBy('nama')->get();
        } else {
            $this->dropdown = Barang::where('nama', 'like', '%' . $this->search . '%')->get();
            if ($this->statusDagang == 'Jual') {
                $this->dropdown = $this->dropdown->where('stok', '>', 0);
            }
            $this->dropdown = $this->dropdown->shuffle()->take(5);
        }
        return view('livewire.transaksi.detail.add-edit-modal', [
            'jpedapatan' => $this->dropdown
        ]);
    }
}
