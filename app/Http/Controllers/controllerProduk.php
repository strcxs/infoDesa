<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class controllerProduk extends Controller
{
    public function index(){
        $data = Produk::with("dataImage")
        ->orderBy('created_at', 'desc')
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
        $img = ProdukImg::where('id_produk','=',$data->id)->get();

        if($img!=null){
            foreach ($img as $image) {
                Storage::delete('public/images/produk/'.$image->produk_img);
                $image-> delete();
            }
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
            "telp"=> $request->get("telp"),
            "link"=> $request->get("link"),
        ]);
        return $create;
    }
    
}
