<?php

namespace App\Http\Controllers;

use App\Models\AtraksiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class atraksiImgController extends Controller
{
    public function destroy($id){
        $data = AtraksiImg::find($id);

        if ($data->atraksi_img != null) {
            Storage::delete('public/images/atraksi/'.$data->atraksi_img);
        }

        $data-> delete();

        return $data;
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_atraksi' => 'required', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = AtraksiImg::create([
            'id_atraksi'=> $request->id_atraksi,
        ]);

        return $data;
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'atraksiImages.*'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),442);
        }
        $data = AtraksiImg::find($id);
        $files = $request->file('atraksiImages');
        foreach ($files as $file) {
            $file->storeAs('public/images/atraksi/', $file->hashName()); 

            AtraksiImg::find($id)->update([
                'atraksi_img'=> $file->hashName(),
                'updated_at' => now(),
            ]);
        };

        return  $data;
    }
}
