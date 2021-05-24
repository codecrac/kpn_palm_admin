<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
//    public $timestamps = false;
    public $guarded = [];

    public function producteur(){
        return $this->belongsTo(Producteur::class,'id_producteur');
    }
}
