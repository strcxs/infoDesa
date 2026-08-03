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

        $produk = collect([
            new Produk([
                "id" => 1,
                "is_default" => true,
                "nama" => "Produk Default",
                "deskripsi" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "telp" => "081234567890",
                "link" => "https://www.instagram.com",
            ]),
            new Produk([
                "id" => 2,
                "is_default" => true,
                "nama" => "Produk Default 2",
                "deskripsi" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "telp" => "081234567890",
                "link" => "https://www.instagram.com",
            ]),
            new Produk([
                "id" => 3,
                "is_default" => true,
                "nama" => "Produk Default 3",
                "deskripsi" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "telp" => "081234567890",
                "link" => "https://www.instagram.com",
            ]),
        ]);

        $produk[0]->setRelation('dataImage', collect([
            new ProdukImg([
                "id" => 1,
                "id_produk" => 1,
                "produk_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $produk[1]->setRelation('dataImage', collect([
            new ProdukImg([
                "id" => 1,
                "id_produk" => 2,
                "produk_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $produk[2]->setRelation('dataImage', collect([
            new ProdukImg([
                "id" => 1,
                "id_produk" => 3,
                "produk_img" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "created_at" => "2024-06-01T12:00:00Z",
                "updated_at" => "2024-06-01T12:00:00Z",
            ])
        ]));
        $default = $produk;

        if (config('app.is_demo')) {
            return $default;
        }

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
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(),[
                'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            $data = $request->file('image');
            $data->storeAs('public/images/produk/', $data->hashName());
            //delete old image
            if (Produk::find($id)) {
                Storage::delete('public/images/produk/'.Produk::find($id)->image);
            }
            // Storage::delete('public/images/produk/'.Produk::find($id)->image);
            
            Produk::find($id)->update([
                'image'=> $data->hashName(),
                'updated_at' => now(),
            ]);
        }
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
