<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'desc')->get();
        return view('backend.v_customer.index', [
            'judul' => 'Data Customer',
            'index' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::where('role', '2')->orderBy('nama', 'asc')->get();
        $user = User::where('role', '2')
            ->where('status', 0)
            ->orderBy('nama', 'asc')
            ->get();
        return view('backend.v_customer.create', [
            'judul' => 'Tambah Customer',
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nama'=>'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required',
            'password'=>'required',
            'email'=>'required',
            'hp'=>'required|min:10|max:13'
        ]);

        $simpanuser = User::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'role'=>2,
            'status'=>1,
            'hp'=>$request->hp,
            'password'=>bcrypt($request->password)
        ]);

        //mendapatkan insert id
        $iduser= $simpanuser->id;

        // dd($iduser);

        $simpan = Customer::create([
            'user_id'=>$iduser,
            'alamat'=>$request->alamat,
            'tgl_lahir'=>$request->tgl_lahir,
            'gender'=>$request->gender,
            'kode_pos'=>$request->kode_pos,
        ]);

        
        return redirect('/customer')->with('success','Data Customer berhasil disimpan');
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
        $customer = Customer::find($id);
        return view('backend.v_customer.edit', [
            'judul' => 'Ubah Customer',
            'edit' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //mengambil data user
        $user = User::find($request->userid);        

        $validatedData = $request->validate([
            'nama'=>'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required',
            'email'=>'required',
            'hp'=>'required|min:10|max:13'
        ]);

        if(!$request->password || $request->password === null){
            $pwd = $user->password;
        } else {
            $pwd = bcrypt($pwd);
        }

        $simpanuser = User::where('id',$request->userid)->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'status'=>$request->status,
            'hp'=>$request->hp,
            'password'=>$pwd
        ]);

        // dd($iduser);

        $simpan = Customer::where('id',$id)->update([
            'alamat'=>$request->alamat,
            'tgl_lahir'=>$request->tgl_lahir,
            'gender'=>$request->gender,
            'kode_pos'=>$request->kode_pos,
        ]);

        
        return redirect('/customer')->with('success','Data Customer berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        User::where('id', $customer->user_id)->delete();
        return redirect('/customer')->with('success','Data Customer berhasil dihapus');
    }



    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
