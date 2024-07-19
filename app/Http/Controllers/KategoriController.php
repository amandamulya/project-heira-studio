<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'desc')->get();
        return view('backend.v_kategori.index', [
            'judul' => 'Data Kategori',
            'index' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_kategori.create', [
            'judul' => 'Tambah Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // ddd($request);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'required|mimes:jpg,jpeg,png,pdf,webp|max:50000'
        ]);

        $gambar = $request->file('gambar');
        $fileName = rand().'-'.date('dmY').'.'.$gambar->extension(); //merubah namafile
        $gambar->move('./fotokategori/',$fileName); //menaruh foto/gambarnya
        Kategori::create([
            'nama_kategori'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$fileName
        ]);
        return redirect('/kategori')->with('success','Data Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('backend.v_kategori.edit', [
            'judul' => 'Ubah Kategori',
            'query' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //ambil foto lama
        $getkategori = Kategori::find($id);
        
        $rules = [
            'nama' => 'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'mimes:jpg,jpeg,png,pdf,webp|max:50000'
        ];
        $validatedData = $request->validate($rules);

        $gambar = $request->file('gambar');

        //jika tidak upload gambar
        if(!$gambar || empty($gambar)){
            $fotolama = $getkategori->foto;
        } else {
            $fileName = rand().'-'.date('dmY').'.'.$gambar->extension(); //merubah namafile
            $gambar->move('./fotokategori/',$fileName); //menaruh foto/gambarnya
            $fotolama = $fileName;
        }       
        

        Kategori::where('id', $id)->update([
            'nama_kategori'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$fotolama
        ]);
        return redirect('/kategori')->with('success','Update Paket telah berhasil');
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
