<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // confirmDelete("delete user", "delete kah manis ?");
        return view('pages.pengelola.index');
    }
}
