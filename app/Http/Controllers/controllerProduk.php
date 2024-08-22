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

        foreach ($data->data_image as $value) {
            Storage::delete('public/images/produk/'.$value->produk_img);
        }
        $data-> delete();

        return $data;
    }
    public function update(Request $request,$id){
        $key = collect($request->all())->keys();
        // if (condition) {
        //     # code...
        // }
        $update = Produk::find($id);
        for ($i=0; $i < count($key); $i++) { 
            $update->update([
                $key[$i]=> $request->get($key[$i]),
            ]);
        }
        return $update;
    }
    public function store(Request $request){
        $key = collect($request->all())->keys();
        
        $create = Produk::create([
            "nama"=> $request->get("nama"),
            "deskripsi"=> $request->get("deskripsi"),
            "link"=> $request->get("link"),
        ]);
        return $create;
    }
    
}
