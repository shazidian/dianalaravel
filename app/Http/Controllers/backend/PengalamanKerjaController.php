<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\DB, App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    public function index(){
        return view('backend.pengalamankerja.index');
    }
    public function create(){
        $pengalaman_kerja = null;
        return view('backend.pengalamankerja.create', compact('pengalaman_kerja'));
    }
    public function store(Request $request){

        DB::table('pengalaman_kerja')->insert([
            'nama'=> $request->nama,
            'jabatan'=> $request->jabatan,
            'tahun_masuk'=> $request->tahun_masuk,
            'tahun_keluar'=> $request->tahun_keluar,
        ]);
        return redirect()->route('pengalaman_kerja.index')
        ->with('success','Data telah berhasil disimpan.');
    }
}