<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pesanan};
use Auth;

class PesananmemberController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;
        $pesanan = Pesanan::with('customer')->where('id_customer',$userid)->get();

        return view('frontend.pesanan.index',compact('pesanan'));
    }


    public function bayar(Request $request){
        // dd($request->id);
        
        $validatedData = $request->validate([
            'gambar'=>'required|mimes:jpg,jpeg,png,pdf,webp|max:50000'
        ]);

        $gambar = $request->file('gambar');
        $fileName = rand().'-'.date('dmY').'.'.$gambar->extension(); //merubah namafile
        $gambar->move('./buktitf/',$fileName); //menaruh foto/gambarnya
        Pesanan::where('id',$request->id)->update([
            'total_bayar'=>$request->totalbayar,
            'bukti_bayar'=>$fileName,
        ]);

        
        return redirect('/memberpesanan')->with('success','Pembayaran berhasil dikirimkan');
    }
}
