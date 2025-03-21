<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\DB, App\Http\Controllers\Controller;
use Illuminate\Http\Request,  App\Models\PengalamanKerja;
use Illuminate\Support\Facades\Log;

class PengalamanKerjaController extends Controller
{
    public function index(){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.pengalamankerja.index', compact('pengalaman_kerja'));
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
    public function edit($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.pengalamankerja.create', compact('pengalaman_kerja'));
    }
    // public function update (Request $request) {
    //     DB::table('pengalaman_kerja')->where('id', $request->id)->update([
    //         'nama' => $request->nama,
    //         'jabatan' => $request->jabatan,
    //         'tahun_masuk' => $request->tahun_masuk,
    //         'tahun_keluar' => $request->tahun_keluar,
    //     ]);
    //     return redirect()->route('pengalaman_kerja.index')->with('success', 'Pengalaman Kerja Anda berhasil diperbaharui!');
    // }
    public function update(Request $request, $id) {
        Log::info('ID yang diterima:', ['id' => $id]);
        Log::info('Data yang dikirim:', $request->all());

        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();

        if (!$pengalaman_kerja) {
            return redirect()->route('pengalaman_kerja.index')->with('error', 'Data tidak ditemukan!');
        }

        DB::table('pengalaman_kerja')->where('id', $id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data berhasil diperbaharui!');
    }

    public function destroy(PengalamanKerja $pengalaman_kerja)
    {
        $pengalaman_kerja->delete();
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Pengalaman Kerja Anda berhasil dihapus!');
    }
}
