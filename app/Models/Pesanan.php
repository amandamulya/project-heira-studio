<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\{Paket, Customer, User};

class Pesanan extends Model
{
    public $timestamps = true;
    protected $table = "pesanan";
    protected $guarded = [];
    
    public function paket ()
    {
       return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function admin() {
      return $this->belongsTo(User::class,'id_admin');
    }


    public function customer(){
      return $this->belongsTo(User::class,'id_customer');
    }



}
