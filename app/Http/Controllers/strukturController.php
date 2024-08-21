<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class strukturController extends Controller
{
    public function index(){
        return Struktur::first();
    }
    public function update(Request $request,$id){
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(),[
                'image'     => 'image|mimes:jpeg,jpg|max:2048',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            $data = $request->file('image');
            $data->storeAs('public/images/struktur/', $data->hashName());
    
            //delete old image
            Storage::delete('public/images/struktur/'.Struktur::find($id)->image);
            
            $update = Struktur::find($id)->update([
                'image'=> $data->hashName(),
                'updated_at' => now(),
            ]);

            return $update;
        }
    }
}
