<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer,Paket, Kategori, Pesanan, User};

class DashboardController extends Controller
{
    public function index(){
        $totalcustomer = Customer::count(); //Count ini fungsinya untuk menampilkan jumlah data pada tabel
        $totalpaket = Paket::count();
        $totalkategori = Kategori::count();
        $totalorder = Pesanan::count();

        return view('backend.v_home.index',compact('totalcustomer','totalpaket','totalkategori','totalorder'));
    }
}
