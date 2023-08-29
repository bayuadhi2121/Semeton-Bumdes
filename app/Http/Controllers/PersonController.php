<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete("delete user", "delete kah manis ?");
        return view('pages.testaddPerson', [
            'pengelola' => Person::where('status', '!=', 'Ketua')->orderBy('status', 'DESC')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'kontak' => 'required',
            'username' => 'required',
            'status' => 'required'
        ]);
        Person::create($validatedData);

        Alert::success('Tambah Berhasil', 'Pengelola Berhasil Ditambahkan!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)

    {
        // dd($id);
        Person::destroy($id);
        Alert::success('Delete Berhasil', 'Pengelola Berhasil Dihapus!');
        return redirect()->back();
    }
}
