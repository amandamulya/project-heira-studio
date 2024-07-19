<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Helpers\ImageHelper;
use App\Models\Kategori;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::orderBy('updated_at', 'desc')->get();
        return view('backend.v_paket.index', [
            'judul' => 'Data Paket',
            'index' => $paket
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('backend.v_paket.create', [
            'judul' => 'Tambah Paket',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'nama_paket' => 'required|max:255|unique:paket',
            'detail' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);
        $validatedData['status'] = 0;

        // menggunakan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-paket/';
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 500, null);
            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }
        Paket::create($validatedData, $messages);
        return redirect('/paket ')->with('success', 'Data berhasil tersimpan');
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
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('backend.v_paket.edit', [
            'judul' => 'Ubah Paket',
            'edit' => $paket,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //ddd($request);
        $paket = Paket::findOrFail($id);
        $rules = [
            'kategori_id' => 'required',
            'status' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ];
        $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ];

        if ($request->nama_paket != $paket->nama_paket) {
            $rules['nama_paket'] = 'required|max:255|email|unique:paket';
        }
        $validatedData = $request->validate($rules, $messages);

        // menggunakan ImageHelper
        if ($request->file('foto')) {
            if ($paket->foto) {
                $oldImagePath = public_path('storage/img-paket/') . $paket->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-paket/';
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 500, null);
            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }

        $paket->update($validatedData);
        return redirect('/paket')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        if ($paket->foto) {
            $oldImagePath = public_path('storage/img-paket/') . $paket->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $paket->delete();
        return redirect('/paket')->with('msgSuccess', 'Data berhasil dihapus');
    }
}
