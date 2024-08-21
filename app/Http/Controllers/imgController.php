<?php

namespace App\Http\Controllers;

use App\Models\ProdukImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class imgController extends Controller
{
    public function destroy($id){
        $data = ProdukImg::find($id);

        if ($data->produk_img != null) {
            Storage::delete('public/images/produk/'.$data->produk_img);
        }

        $data-> delete();

        return $data;
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = ProdukImg::create([
            'id_produk'=> $request->id_produk,
        ]);

        return $data;
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'productImages.*'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),442);
        }
        $data = ProdukImg::find($id);
        $files = $request->file('productImages');
        foreach ($files as $file) {
            $file->storeAs('public/images/produk/', $file->hashName()); 

            ProdukImg::find($id)->update([
                'produk_img'=> $file->hashName(),
                'updated_at' => now(),
            ]);
        };

        return  $data;
    }
}
