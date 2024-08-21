<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class controllerProduk extends Controller
{
    public function index(){
        $data = Produk::with("dataImage")
        ->get();

        return $data;
    }
    public function show($id){
        $data = Produk::with("dataImage")
        ->find($id);

        return $data;
    }
    public function destroy($id){
        $data = Produk::find($id);

        if ($data->image != null) {
            Storage::delete('public/images/produk/'.$data->produk_img);
        }

        $data-> delete();

        return $data;
    }
}
