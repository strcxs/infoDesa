<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class controllerProduk extends Controller
{
    public function index(){
        $data = Produk::with("dataImage")
        ->get();

        return $data;
    }
}
