<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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
public function resize_upload(Request $request)
{
    $this->validate($request, [
        'file' => 'required',
        'keterangan' => 'required',
    ]);

    // TENTUKAN PATH LOKASI UPLOAD
    $path = public_path('img/logo');

    // JIKA FOLDERNYA BELUM ADA, BUAT FOLDERNYA
    if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true);
    }

    // MENGAMBIL FILE IMAGE DARI FORM
    $file = $request->file('file');

    // MEMBUAT NAME FILE
    $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

    // INISIALISASI IMAGE MANAGER DENGAN DRIVER GD
    $manager = new ImageManager(new Driver());

    // MEMBUAT IMAGE DAN RESIZE
    $image = $manager->read($file->getPathname())->scale(200, 200);

    // SIMPAN IMAGE KE FOLDER
    if ($image->save($path . '/' . $fileName)) {
        return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
    } else {
        return redirect(route('upload'))->with('error', 'Data gagal ditambahkan!');
    }
}

}