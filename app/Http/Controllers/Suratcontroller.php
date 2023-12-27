<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Surat_Masuk;
use App\Models\Model_Rapat;
use App\Models\Model_Kaprodi;

class Suratcontroller extends Controller
{
    public function surat_masuk()
    {
        
        // Ambil semua surat masuk beserta informasi kaprodi terkait menggunakan eager loading
        $suratMasuk = Surat_Masuk::with('kaprodi')->whereStatus(1)->get();
        $kaprodi = Model_Kaprodi::all();

        // Kirim data surat masuk ke view untuk ditampilkan
        return view('surat.surat_masuk', compact('suratMasuk', 'kaprodi'));
    }

    public function store(Request $request)
    {
       //dd($request);
       if($request->file('pdf')){
            $pdf = $request->file('pdf');
            $vendor['pdf'] = time().'_'. $pdf->getClientOriginalName();
            $filePath = public_path('/upload/surat_masuk');
            $pdf->move($filePath, $vendor['pdf']);
       }
        $surat_masuk = new Surat_Masuk;
        $surat_masuk->nomor_agenda = $request->nomor_agenda;
        $surat_masuk->nomor_surat = $request->nomor_surat;
        $surat_masuk->tanggal_surat = $request->tanggal_surat;
        $surat_masuk->tanggal_masuk = $request->tanggal_masuk;
        $surat_masuk->pengirim = $request->pengirim;
        $surat_masuk->kaprodi_id = $request->kepada;
        $surat_masuk->keterangan = $request->keterangan;
        $surat_masuk->file = $vendor['pdf'];
        $surat_masuk->status = 1;
        $surat_masuk->save();
        return redirect('/surat_masuk');
        
    }
    
    public function update(Request $request, $id)
    {
        //dd($request);
        
        $surat_masuk = Surat_Masuk::find($id);
        $surat_masuk->nomor_agenda = $request->nomor_agenda;
        $surat_masuk->nomor_surat = $request->nomor_surat;
        $surat_masuk->tanggal_surat = $request->tanggal_surat;
        $surat_masuk->tanggal_masuk = $request->tanggal_masuk;
        $surat_masuk->pengirim = $request->pengirim;
        $surat_masuk->kaprodi_id = $request->kepada;
        $surat_masuk->keterangan = $request->keterangan;
        
        $surat_masuk->save();

        return redirect('/surat_masuk');
    }

    public function hapus($id)
    {
        //dd($id);
        
        $surat_masuk = Surat_Masuk::find($id);
        
        $surat_masuk->status = 0;
        
        $surat_masuk->save();

        return redirect('/surat_masuk');
    }

    public function get_data($id)
    {
        //dd($id);
        $data = Surat_Masuk::find($id);
        return response()->json([
            'nomor_agenda' => $data->nomor_agenda,
            'nomor_surat' => $data->nomor_surat,
            'tanggal_surat' => $data->tanggal_surat,
            'tanggal_masuk' => $data->tanggal_masuk,
            'pengirim' => $data->pengirim,
            'kepada' => $data->kaprodi_id,
            'keterangan' => $data->keterangan,
            'file' => $data->file,
        ]);
    }

    public function ambil_data_rapat($id)
    {
        //dd($id);
        $data = Model_Rapat::find($id);
        return response()->json([
            'judul' => $data->judul,
            
        ]);
    }
    

    public function galery()
    {
        return view('surat.galery_surat_masuk');
    }
}
