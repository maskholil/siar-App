<?php

namespace App\Http\Controllers;

use App\Models\Model_Rapat;
use Illuminate\Http\Request;

class RapatController extends Controller
{
    public function index()
    {
        
        // Ambil semua surat masuk beserta informasi kaprodi terkait menggunakan eager loading
        $rapat = Model_Rapat::all();
        

        // Kirim data surat masuk ke view untuk ditampilkan
        return view('rapat.index', compact('rapat'));
    }

    public function store(Request $request)
    {
       //dd($request);
      
        $rapat = new Model_Rapat;
        $rapat->tanggal = $request->tanggal;
        $rapat->tempat = $request->tempat;
        $rapat->judul = $request->judul;
        $rapat->agenda = $request->agenda;
        $rapat->dipimpin = $request->dipimpin;
        $rapat->sekertaris = $request->sekertaris;
        $rapat->jabatan_pimpinan = $request->jabatan_pimpinan;
        $rapat->jabatan_sekertaris = $request->jabatan_sekertaris;
        $rapat->rapat_dibuka = $request->rapat_dibuka;
        $rapat->rapat_ditutup = $request->rapat_ditutup;
        $rapat->hasil = $request->hasil;
        $rapat->save();
        return redirect('/rapat');
        
    }

    public function update(Request $request, $id)
    {
        
        if($request->file('photo')){
            $img = $request->file('photo');
            $vendor['photo'] = time().'_'. $img->getClientOriginalName();
            $filePath = public_path('/upload/foto_rapat');
            $img->move($filePath, $vendor['photo']);
        }
        //dd($img->move($filePath, $vendor['photo']));
        $rapat = Model_Rapat::find($id);
        //dd($vendor['photo']);
        $rapat->file = $vendor['photo'];
        $rapat->hasil = $request->hasil;
        $rapat->save();
        return redirect('/rapat');
    }


}
