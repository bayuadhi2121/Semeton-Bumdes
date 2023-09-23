<?php

namespace App\Livewire\Navigation;

use App\Models\Usaha;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Nav extends Component
{
    private $id_person;

    public $title, $status;

    #[On('page-refresh', '$refresh')]

    public function mount($title, $status)
    {
        $this->id_person = Auth::user()->id_person;
        $this->title = $title;
        $this->status = $status;
    }

    #[Computed]
    public function usaha()
    {
        return Usaha::where('id_person', $this->id_person)->select('id_usaha', 'nama')->get();
    }

    public function showTransaksi($usaha)
    {
        $this->redirect(route('transaksi', [
            'usaha' => $usaha,
            'status' => $this->status
        ]));
    }

    public function render()
    {
        return view('livewire.navigation.nav');
    }
}
