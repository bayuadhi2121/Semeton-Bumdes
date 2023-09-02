<?php

namespace App\Http\Controllers;


class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // confirmDelete("delete user", "delete kah manis ?");
        return view('pages.usaha.index');
    }
}
