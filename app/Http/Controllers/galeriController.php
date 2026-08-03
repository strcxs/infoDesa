<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class galeriController extends Controller
{
    public function index(){
        $data = galeri::orderBy('created_at', 'desc')
        ->get();

        $default = collect([
            new galeri([
                "id" => 1,
                "is_default" => true,
                "image" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "caption" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "title" => "Title Default",
            ]),
            new galeri([
                "id" => 2,
                "is_default" => true,
                "image" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "caption" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "title" => "Title Default 2",
            ]),
            new galeri([
                "id" => 3,
                "is_default" => true,
                "image" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "caption" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "title" => "Title Default 3",
            ]),
            new galeri([
                "id" => 4,
                "is_default" => true,
                "image" => "https://www.svgrepo.com/show/508699/landscape-placeholder.svg",
                "caption" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic",
                "title" => "Title Default 4",
            ]),
        ]);

        if (config('app.is_demo')) {
            return $default;
        }

        return $data;
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'caption' => 'required', 
            'title' => 'required', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->youTube != null) {
            $data = galeri::create([
                'youTube'=> $request->youTube,
                'caption'=> $request->caption,
                'title'=> $request->title,
            ]);
            return $data;
        }else{
            $data = galeri::create([
                'caption'=> $request->caption,
                'title'=> $request->title,
            ]);
            return $data;
        }
    }
    public function update(Request $request, $id){
        $key = collect($request->all())->keys();
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(),[
                'image'     => 'image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            $data = $request->file('image');
            $data->storeAs('public/images/galeri/', $data->hashName());
            //delete old image
            if (galeri::find($id)) {
                Storage::delete('public/images/galeri/'.galeri::find($id)->image);
            }
            // Storage::delete('public/images/galeri/'.galeri::find($id)->image);
            
            galeri::find($id)->update([
                'image'=> $data->hashName(),
                'updated_at' => now(),
            ]);
        }

        for ($i=0; $i < count($key); $i++) { 
            if ($key[$i]!="image") {
                $update = galeri::find($id);
                $update->update([
                    $key[$i]=> $request->get($key[$i]),
                ]);
            }
        }
    }
    public function destroy($id){
        $data = galeri::find($id);

        if ($data->image != null) {
            Storage::delete('public/images/galeri/'.$data->image);
        }

        $data-> delete();

        return $data;
    }
}
