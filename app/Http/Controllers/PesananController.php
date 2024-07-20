<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('customer','admin')->orderBy('id', 'desc')->get();
        // dd($pesanan);
        return view('backend.v_pesanan.index', [
            'judul' => 'Data Pemesanan',
            'index' => $pesanan
        ]);
    }

    // public function create($idpaket)
    // {
    //     $paket = Paket::find($idpaket);
    //     return view('frontend.pesanan.create', [
    //         'judul' => 'Tambah Pesanan',
    //         'query'=>$paket
    //     ]);
    // }

    public function store(Request $request)
    {

        Pesanan::create([
            'id_customer'=>Auth::user()->id,
            'id_admin'=>1,
            'tgl_pesan'=>date('Y-m-d H:i:s'),
            'tgl_acara'=>$request->tanggal,
            'jam_acara'=>$request->waktu,
            'id_paket'=>$request->paketid,
            'status'=>'baru'

        ]);

        return redirect('/memberpesanan')->with('success','Pesanan berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = Pesanan::with('customer','admin','paket')->find($id);
        // dd($pesanan);
        return view('backend.v_pesanan.edit', [
            'judul' => 'Proses Pesanan',
            'edit' => $pesanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $rules = [
            'status' => 'required',
        ];
        $validatedData = $request->validate($rules);    

        Pesanan::where('id', $id)->update([
            'status'=>$request->status,
        ]);
        return redirect('/pesanan')->with('success','Proses pesanan berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        //untuk menghapus file dari drive
        if(file_exists('./fotokategori/'.$kategori->foto)){
            unlink('./fotokategori/'.$kategori->foto);
        }

        $kategori->delete();
        return redirect('/kategori')->with('success','Hapus Paket telah berhasil');
    }
}
