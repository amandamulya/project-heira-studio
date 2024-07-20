<?php

namespace App\Http\Controllers;

use App\Models\{Customer,User, Testimoni};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $query = Customer::where('user_id',Auth::user()->id)->first();

        return view('frontend.member.profil',compact('query'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->userid);

        if(!$request->password || $request->password === null){
            $pwd = $user->password;
        } else {
            $pwd = bcrypt($request->password);
        }

        $simpanuser = User::where('id',$request->userid)->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'hp'=>$request->hp,
            'password'=>$pwd
        ]);

        // dd($iduser);

        $simpan = Customer::where('user_id',$request->userid)->update([
            'alamat'=>$request->alamat,
            'tgl_lahir'=>$request->tgllahir,
            'gender'=>$request->jenkel,
            'kode_pos'=>$request->kodepos,
        ]);

        return redirect('member/profil')->with('success','Profil anda berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }


    public function testimoni()
    {
        $query = Testimoni::with('user')->get();

        return view('frontend.testimoni.index',compact('query'));
    }


    public function testimonistore(Request $request){

        $simpan = Testimoni::create([
            'user_id'=>Auth::user()->id,
            'isi_testimoni'=>$request->isi
        ]);

        return redirect('member/testimoni')->with('success','Testimoni berhasil ditambahkan');
    }
}
