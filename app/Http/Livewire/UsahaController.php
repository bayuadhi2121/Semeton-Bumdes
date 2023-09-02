<?php

namespace App\Http\Livewire;

use App\Models\Usaha;
use Livewire\Component;
use Livewire\WithPagination;

class UsahaController extends Component
{
    use WithPagination;

    public $id_usaha = '';
    public $nama = '';
    public $status = '';
    public $person = '';

    public function save()
    {
        if($this->id_usaha == '') {
            $this->store();
        } else {
            $this->update();
        }
    }

    public function store()
    {
        Usaha::create([
            'nama' => $this->nama,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit(Usaha $usaha)
    {
        $this->id_usaha = $usaha->id_usaha;
        $this->nama = $usaha->nama;
        $this->status = $usaha->status;
    }

    public function update() {
        Usaha::find($this->id_usaha)->update([
            'nama' => $this->nama,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('close-modal');
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
    }

    public function render()
    {
        return view('livewire.usaha', [
            'usaha' => Usaha::latest()->paginate(10)
        ]);
    }
}
