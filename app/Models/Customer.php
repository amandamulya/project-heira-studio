<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;
    protected $table = "customer";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
