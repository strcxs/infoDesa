<?php

namespace App\Models;

use App\Models\AtraksiImg;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atraksi extends Model
{
    use HasFactory;
    protected $table = "atraksi";
    protected $guarded = [];

    public function dataImage(){
        return $this->hasMany(AtraksiImg::class,'id_atraksi','id');
    }
}
