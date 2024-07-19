<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paket;

class Kategori extends Model
{
    public $timestamps = false;
    protected $table = "kategori";
    // protected $fillable = ['nama','hp'];
    protected $guarded = ['id'];

    public function paket()
    {
        return $this->hasMany(Paket::class,'id');
    }
}
