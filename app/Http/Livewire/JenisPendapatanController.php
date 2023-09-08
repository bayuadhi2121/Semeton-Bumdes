<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisPendapatan;
use App\Models\Usaha;
use Livewire\WithPagination;

class JenisPendapatanController extends Component
{
    use WithPagination;
    public $nama, $search, $delete, $id_jpendapatan;
    public $id_usaha;
    protected $rules = [
        'nama' => 'required|min:3',
        'id_usaha' => 'nullable'
    ];
    protected $messages = [
        'id_usaha.exists' => 'Usaha tidak ada '
    ];
    public function edit(JenisPendapatan $JenisPendapatan)
    {
        $this->nama = $JenisPendapatan->nama;
        $this->id_jpendapatan = $JenisPendapatan->id_jpendapatan;
        $this->id_usaha = $JenisPendapatan->usaha->nama ?? '';
    }
    public function store()
    {
        $validatedData = $this->validate();

        JenisPendapatan::create($validatedData);

        $this->render();
        $this->resetInput();
        $this->dispatch('close-modal');
    }
    public function resetInput()
    {
        $this->resetValidation();
        $this->reset();
        $this->resetPage();
    }
    public function setDelete($id)
    {
        $this->id_jpendapatan = $id;
    }
    public function runAction()
    {
        if ($this->id_jpendapatan == '') {
            $this->store();
        } else {
            $this->update();
        }
    }
    public function update()
    {
        $id_usaha = Usaha::where('nama', $this->id_usaha)->pluck('id_usaha')->first() ?? "";

        JenisPendapatan::find($this->id_jpendapatan)->update([
            'nama' => $this->nama,
            'id_usaha' => $id_usaha
        ]);
        $this->dispatch('close-modal');
    }
    public function destroy()
    {
        JenisPendapatan::destroy($this->id_jpendapatan);
        $this->reset();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.jenis-pendapatan-controller', [
            'jenispendapatan' => JenisPendapatan::where('nama', '!=', 'dummy')->latest()->paginate(10),
            'usaha' => Usaha::get()
        ]);
    }
}
