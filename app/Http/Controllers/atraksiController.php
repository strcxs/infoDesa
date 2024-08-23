<?php

namespace App\Http\Controllers;

use App\Models\Atraksi;
use App\Models\AtraksiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class atraksiController extends Controller
{
    public function index(){
        $data = Atraksi::with("dataImage")
        ->orderBy('created_at', 'desc')
        ->get();

        return $data;
    }
    public function show($id){
        $data = Atraksi::with("dataImage")
        ->find($id);

        return $data;
    }
    public function destroy($id){
        $data = Atraksi::find($id);
        $img = AtraksiImg::where('id_atraksi','=',$data->id)->get();

        if($img!=null){
            foreach ($img as $image) {
                Storage::delete('public/images/atraksi/'.$image->atraksi_img);
                $image-> delete();
            }
        }
        $data-> delete();

        return $data;
    }
    public function update(Request $request,$id){
        $key = collect($request->all())->keys();
        $update = Atraksi::find($id);
        for ($i=0; $i < count($key); $i++) { 
            $update->update([
                $key[$i]=> $request->get($key[$i]),
            ]);
        }
        return $update;
    }
    public function store(Request $request){
        $create = Atraksi::create([
            "nama"=> $request->get("nama"),
            "medsos"=> $request->get("medsos"),
            "gmaps"=> $request->get("gmaps"),
        ]);
        return $create;
    }
}
