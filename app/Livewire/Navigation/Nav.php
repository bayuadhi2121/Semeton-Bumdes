<?php

namespace App\Livewire\Navigation;

use App\Models\Usaha;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Nav extends Component
{

    #[On('page-refresh', '$refresh')]
    public function showTransaksi($usaha)
    {
        return redirect()->route('trxjasa', ['usaha' => $usaha]);
    }
    public function render()
    {
        // $id = Auth::user()->id_person;
        if (Auth::check()) {
            $id = Auth::user()->id_person;
        }
        return view('livewire.navigation.nav', [
            'usaha' => Usaha::where('id_person', $id)->get()
        ]);
    }
}
