<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }

    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        // nama file
        echo 'File Name: '.$file->getClientOriginalName().'<br>';
        // ekstensi file
        echo 'File Extension: '.$file->getClientOriginalExtension().'<br>';
        // real path
        echo 'File Real Path: '.$file->getRealPath().'<br>';
        // ukuran file
        echo 'File Size: '.$file->getSize().'<br>';
        // tipe mime
        echo 'File Mime Type: '.$file->getMimeType().'<br>';

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
    }
    public function dropzone()
{
    return view('dropzone');
}

public function dropzone_store(Request $request)
{
    $image = $request->file('file');

    $imageName = time().'.'.$image->extension();
    $image->move(public_path('img/dropzone'), $imageName);
    return response()->json(['success' => $imageName]);
}
public function pdf_upload(){
    return view('pdf_upload');
}
public function pdf_store(Request $request){
    $pdf = $request->file('file');
    $pdfName = 'pdf_'.time().'.'.$pdf->extension();
    $pdf->move(public_path('pdf/dropzone'), $pdfName);
    return response()->json(['success'=>$pdfName]);
}

public function viewResize()
    {
        return view('upload_resize');
    }

    public function proses_upload_resize(Request $request, ImageManager $imageManager)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ]);

        // Tentukan path lokasi upload
        $path = public_path('img/logo');

        // Jika folder belum ada, buat foldernya
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Ambil file dari form
        $file = $request->file('file');

        // Buat nama file unik
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Baca gambar menggunakan ImageManager
        $image = $imageManager->read($file->getRealPath());

        $resizedImage = $image->cover(200, 200);

        // Simpan hasil gambar ke folder
        file_put_contents($path . '/' . $fileName, $resizedImage->toJpeg());

        return redirect(route('upload.resize'))->with('success', 'Data berhasil ditambahkan!');
    }

}
