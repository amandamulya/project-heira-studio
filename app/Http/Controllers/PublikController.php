<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Kategori, Paket};

class PublikController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }


    public function about()
    {
        return view('frontend.aboutus');
    }


    public function category()
    {
        $kategori = Kategori::all();
        return view('frontend.category',compact('kategori'));
    }


    public function detailcategory($id)
    {
        $kategori = Kategori::find($id);
        $paket = Paket::where('kategori_id',$id)->get();
        return view('frontend.categorydetail',compact('kategori','paket'));
    }
}
