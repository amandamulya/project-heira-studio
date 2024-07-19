<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananmemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginmemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublikController;
use App\http\Middleware\IsSuperAdmin;
use App\http\Middleware\IsAdmin;
use App\http\Middleware\IsCustomer;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PublikController::class,'index']);
Route::get('/produk',[PublikController::class,'produk']);
Route::get('/produkdetail/{id}',[PublikController::class,'produkdetail']);
Route::post('/booking',[PublikController::class,'booking']);
Route::get('/aboutus',[PublikController::class,'about']);
Route::get('/testimoni',[PublikController::class,'testimoni']);
Route::get('/category',[PublikController::class,'category']);
Route::get('/categorydetail/{id}',[PublikController::class,'detailcategory']);
//Route Untuk member
Route::get('/loginmember',[LoginmemberController::class,'index'])->name('loginmember');
Route::post('/logmemberproses',[LoginmemberController::class,'proses']);

Route::get('home', [HomeController::class, 'index']);

//untuk login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class,'proses']);

Route::middleware([IsCustomer::class])->group(function () {
    Route::get('member',[MemberController::class,'index']);
    Route::get('member/profil',[MemberController::class,'edit']);
    Route::post('member/profilsave',[MemberController::class,'update']);
    Route::get('member/pesanan',[MemberController::class,'pesanan']);
    Route::get('member/pesanandetail/{id}',[MemberController::class,'pesanandetail']);
    Route::post('member/pesananupdate',[MemberController::class,'pesananupdate']);
    Route::get('member/testimoni',[MemberController::class,'testimoni']);
    Route::post('member/testimonisave',[MemberController::class,'testimonistore']);
    Route::get('memberlogout',[MemberController::class,'index']);

    //order
    Route::post('simpanpesanan',[PesananController::class,'store']);
    Route::get('memberpesanan',[PesananmemberController::class,'index']);
    Route::post('memberpesanantf',[PesananmemberController::class,'bayar']);
    
});

Route::middleware([IsAdmin::class])->group(function () {
    //sidebar yang diakses IsAdmin
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('user', UserController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('pesanan', PesananController::class);
});





// Route::middleware([IsSuperAdmin::class])->group(function () {
//     //sidebar yang diakses IsSuperAdmin
// });