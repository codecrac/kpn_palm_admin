<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producteur extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function operations(){
        return $this->hasMany(Operation::class,'id_producteur');
    }
}
