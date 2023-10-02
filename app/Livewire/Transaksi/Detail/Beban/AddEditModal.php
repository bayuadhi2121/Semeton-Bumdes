<?php

namespace App\Livewire\Transaksi\Detail\Beban;

use App\Models\Akun;
use App\Models\Beban;
use Livewire\Component;
use App\Models\JualBeli;
use App\Models\Transaksi;
use App\Models\JenisBiaya;
use App\Models\Usaha;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;

class AddEditModal extends Component
{
    // show untuk menentukan apakah view add edit modal ditampilkan atau tidak
    // showList untuk tampilan list dari jbiaya saat tambah atau edit data
    // title untuk memberikan tanda apakah sedang melakukan tambah data atau edit data
    // mode digunakan untuk memberikan tanda terkait perintah apa yang akan dieksekusi oleh program, apakah akan store data atau update data
    public $show = false, $showList = false, $title, $mode;

    // idtransaksi untuk mengetahui data jual beli masuk ke transaksi yang mana
    // id_jualbeli_temp merupakan variabel bantuan untuk mengecek apakah biaya di update atau tidak
    public $id_transaksi, $id_usaha, $nama_usaha, $id_jualbeli_temp;

    // id_jualbeli untuk menandakan data yang akan diupdate saat ubah data
    // id_jbiaya merupakan foreignkey jenis biaya
    // nama untuk menampilkan nama dari beban yang dipilih, namun yang disimpan pada db yaitu id_jbiaya
    // harga ya harga
    // kuantitas ya jumlah
    public $id_jualbeli, $id_jbiaya, $nama = '', $harga, $kuantitas = 1;

    // untuk menyimpan list dari jenis biaya yang ada
    public Collection $jbiaya;

    // rule untuk validasi inputan pengguna
    public function rules()
    {
        return [
            'id_jbiaya' => 'required|exists:jenis_biayas,id_jbiaya',
            'harga' => 'required|numeric|min:1',
            'kuantitas' => 'required|numeric|min:1',
        ];
    }

    public function mount($transaksi, $usaha)
    {
        $this->id_transaksi = $transaksi;
        $this->id_usaha = $usaha;
        $this->nama_usaha = Usaha::where('id_usaha', $usaha)->select('nama')->first()->nama;
    }

    public function store()
    {
        $this->validate();

        // buat data jualbeli dulu
        $jualbeli = JualBeli::create([
            'id_transaksi' => $this->id_transaksi,
            'kuantitas' => $this->kuantitas,
            'harga' => $this->harga,
            'total' => $this->kuantitas * $this->harga
        ]);

        // baru buat jualbeli beban
        Beban::create([
            'id_jualbeli' => $jualbeli->id_jualbeli,
            'id_jbiaya' => $this->id_jbiaya
        ]);

        $this->closeModal(); // jalankan closeModal
        $this->dispatch('refresh-data'); // trigger fungsi dengan pengenal refresh-data
    }

    public function update()
    {
        $this->validate();

        // cari data jual beli, lalu update datanya
        JualBeli::where('id_jualbeli', $this->id_jualbeli)->update([
            'kuantitas' => $this->kuantitas,
            'harga' => $this->harga,
            'total' => $this->kuantitas * $this->harga
        ]);

        // cek apakah data biaya diubah, jika tidak ya biarkan saja
        // jika iya maka update juga datanya
        if($this->id_jbiaya != $this->id_jualbeli_temp) {
            Beban::where('id_jualbeli', $this->id_jualbeli)->update([
                'id_jbiaya' => $this->id_jbiaya
            ]);
        }

        $this->closeModal(); // jalankan closeModal
        $this->dispatch('refresh-data'); // trigger fungsi dengan pengenal refresh-data
    }

    public function setBeban($id_jbiaya, $nama_jbiaya)
    {
        $this->id_jbiaya = $id_jbiaya; // set id_bjbiaya sesuai dengan pilihan user
        $this->nama = $nama_jbiaya; // set variabel nama sesuai dengan nama biaya yang tersimpan di database
    }

    public function createBeban()
    {
        $this->validate([
            'nama' => 'required|min:1'
        ]);

        $nama_beban = ucwords($this->nama);

        // buat akun dulu gaesss
        $akun = Akun::create([
            'nama' => 'Biaya ' . $nama_beban . ' ' . $this->nama_usaha,
            'id_usaha' => $this->id_usaha
        ]);

        // baru buat jenis biayanya
        $jbiaya = JenisBiaya::create([
            'nama' => $nama_beban,
            'id_usaha' => $this->id_usaha,
            'id_akun' => $akun->id_akun
        ]);


        // update data buat ditampilin di view form-nya
        $this->id_jbiaya = $jbiaya->id_jbiaya;
        $this->nama = $nama_beban;
    }

    #[On('add-modal')]
    public function addModal()
    {
        // jalankan fungsi open modal dengan kasih tanda kalau ini merupakan tambah data
        $this->openModal('store', 'Tambah');
    }

    #[On('edit-modal')]
    public function editModal(JualBeli $jualbeli)
    {
        // isi isi dah data ni sama apa yang kesimpen di db
        $this->id_jualbeli = $jualbeli->id_jualbeli;
        $this->id_jbiaya = $jualbeli->beban->id_jbiaya;
        $this->id_jualbeli_temp = $this->id_jbiaya;
        $this->nama = $jualbeli->beban->jbiaya->nama ?? '';
        $this->harga = $jualbeli->harga;
        $this->kuantitas = $jualbeli->kuantitas;
        $this->openModal('update', 'Edit'); // jalankan fungsi open modal dengan kasih tanda kalau ini merupakan edit data
    }

    private function openModal($mode, $title)
    {
        $this->show = true; // tampilkan modal
        $this->mode = $mode; // set mode yang akan dieksekusi, apakah store atau update
        $this->title = $title; // kasih tanda buat user apakah ini tambah(store) atau edit(update)
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->resetExcept('id_transaksi', 'id_usaha', 'nama_usaha'); // reset semua nilai kecuali variabel id_transaksi
        $this->resetValidation(); // hapus validasi jika ada
    }

    public function showBeban()
    {
        $this->showList = true; // tampilkan list beban yang tersedia
    }

    public function closeBeban()
    {
        $this->showList = false; // sembunyikan list beban yang tersedia
    }

    public function updatedNama()
    {
        if($this->jbiaya->contains('nama', $this->nama)) {
            $this->id_jbiaya = $this->jbiaya->where('nama', $this->nama)->where('id_usaha', $this->id_usaha)->first()->id_jbiaya;
            $this->resetValidation();
        } else if($this->nama != '') {
            $this->id_jbiaya = 'zxcvbnm,./';
        } else {
            $this->reset('id_jbiaya');
            $this->resetValidation();
        }
    }

    public function render()
    {
        $this->jbiaya = JenisBiaya::where('nama', 'like', '%'.$this->nama.'%')->where('id_usaha', $this->id_usaha)->inRandomOrder()->limit(5)->orderBy('nama')->get();
        return view('livewire.transaksi.detail.beban.add-edit-modal', [
            'jualbeli' => JualBeli::all(),
            'jbiaya' => $this->jbiaya
        ]);
    }
}
