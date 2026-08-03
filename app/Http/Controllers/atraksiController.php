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
        
        $atraksi = collect([
            new Atraksi([
                "id" => 1,
                "is_default" => true,
                "nama" => "Kegiatan Berkebun Bersama",
                "medsos" => "https://www.instagram.com",
                "gmaps" => "https://www.google.com/maps",
            ]),
            new Atraksi([
                "id" => 2,
                "is_default" => true,
                "nama" => "Kegiatan Wisata Alam",
                "medsos" => "https://www.instagram.com/",
                "gmaps" => "https://www.google.com/maps",
            ]),
            new Atraksi([
                "id" => 3,
                "is_default" => true,
                "nama" => "Kegiatan Wisata Kuliner",
                "medsos" => "https://www.instagram.com/",
                "gmaps" => "https://www.google.com/maps",
            ]),
        ]);

        $atraksi[0]->setRelation('dataImage', collect([
            new AtraksiImg([
                "id" => 1,
                "id_atraksi" => 1,
                "atraksi_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $atraksi[1]->setRelation('dataImage', collect([
            new AtraksiImg([
                "id" => 1,
                "id_atraksi" => 1,
                "atraksi_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $atraksi[2]->setRelation('dataImage', collect([
            new AtraksiImg([
                "id" => 1,
                "id_atraksi" => 1,
                "atraksi_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $default = $atraksi;

        if (config('app.is_demo')) {
            return $default;
        }

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
