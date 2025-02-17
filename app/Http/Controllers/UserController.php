<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return "Daftar Penduduk Kauman";
    }

    public function show($id)
    {
        return "ID Penduduk Kauman tercatat: " . $id;
    }
}
