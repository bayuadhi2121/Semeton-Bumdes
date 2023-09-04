<?php

namespace App\Http\Livewire;

use App\Models\Akun;
use App\Models\Person;
use App\Models\Usaha;
use Livewire\Component;
use Livewire\WithPagination;

class UsahaController extends Component
{
    use WithPagination;

    public $search = '';
    public $id_usaha = '';
    public $nama = '';
    public $status = '';
    public $person = '';
    protected $rules = [
        'nama' => 'required|min:2',
        'status' => 'required',
    ];
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];


    public function save()
    {
        if ($this->id_usaha == '') {
            $this->store();
        } else {
            $this->update();
        }
    }
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $validatedData = $this->validate();
        $usaha = Usaha::create($validatedData);
        $this->storeAkun($usaha);
        $this->dispatch('close-modal');
    }
    public function storeAkun($usaha)
    {
        if ($usaha->status == 'Jasa') {
            $usaha->akun()->CreateMany([
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Kas ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Pendapatan ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Piutang ' . $usaha->nama
                ],
            ]);
        } else {
            $usaha->akun()->CreateMany([
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Pembelian ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Penjualan ' . $usaha->nama
                ],

                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Kas ' . $usaha->nama
                ],
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Hutang ' . $usaha->nama
                ],
                [
                    'id_usaha' => $usaha->id_usaha,
                    'nama' => 'Piutang ' . $usaha->nama
                ],
            ]);
        }
    }

    public function edit(Usaha $usaha)
    {
        $this->id_usaha = $usaha->id_usaha;
        $this->nama = $usaha->nama;
        $this->status = $usaha->status;
    }

    public function update()
    {
        Usaha::find($this->id_usaha)->update([
            'nama' => $this->nama,
            'status' => $this->status,
        ]);

        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $this->id_usaha = $id;
    }

    public function destroy()
    {
        Usaha::destroy($this->id_usaha);
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.usaha', [
            'usaha' => $this->search === null ? Usaha::latest()->paginate(10) :
                Usaha::where('nama', 'like', '%' . $this->search . '%')->latest()->paginate(10)
        ]);
    }
}
