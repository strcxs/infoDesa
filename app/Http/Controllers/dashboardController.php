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
