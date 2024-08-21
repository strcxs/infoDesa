<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class bannerController extends Controller
{
    public function index(){
        $data = Banner::get();

        return $data;
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
            $data->storeAs('public/images/banner/', $data->hashName());
    
            //delete old image
            Storage::delete('public/images/banner/'.Banner::find($id)->banner_img);
            
            $update = Banner::find($id)->update([
                'banner_img'=> $data->hashName(),
                'updated_at' => now(),
            ]);

            return $update;
        }
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image'     => 'image|mimes:jpeg,jpg|max:2048',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),442);
        }
        $data = $request->file('image');
        $data->storeAs('public/images/banner/', $data->hashName());

        
        $create = Banner::create([
            'banner_img'=> $data->hashName(),
        ]);

        return $create;
    }
    public function destroy($id){
        $data = Banner::find($id);

        if ($data->banner_img != null) {
            Storage::delete('public/images/banner/'.$data->banner_img);
        }

        $data-> delete();

        return $data;
    }
}
