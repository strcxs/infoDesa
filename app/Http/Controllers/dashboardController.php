<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class dashboardController extends Controller
{
    public function index(){
        $data = Dashboard::first();

        $default = [
            new Dashboard([
                "id" => 1,
                "is_default" => true,
                "misi" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "kades_image" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "visi" => 
                    "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "about" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "demografis" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
            ]),
        ];
        if (config('app.is_demo') || $data == null) {
            return $default[0];
        }

        return $data;
    }
    public function update(Request $request,$id){
        $key = collect($request->all())->keys();
        if ($request->hasFile('kades_image')) {
            $validator = Validator::make($request->all(),[
                'kades_image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            //upload image
            $data = $request->file('kades_image');
            $data->storeAs('public/images/kades/', $data->hashName());
            //delete old image
            Storage::delete('public/images/kades/'.Dashboard::find($id)->kades_image);
            
            // update post with new image
            Dashboard::find($id)->update([
                "kades_image" => $data->hashName(),
                'updated_at' => now(),
            ]);
        }
        for ($i=0; $i < count($key); $i++) { 
            if ($key[$i]!="kades_image") {
                $update = Dashboard::find($id);
                $update->update([
                    $key[$i]=> $request->get($key[$i]),
                ]);
            }
        }
        return "Update Success";
    }
}
