<?php

namespace App\Http\Controllers;

use App\Models\Geografis;
use Illuminate\Http\Request;

class geoController extends Controller
{
    public function index(){
        $data = Geografis::first();

        return $data;
    }
    public function update(Request $request,$id){
        $key = collect($request->all())->keys();

        for ($i=0; $i < count($key); $i++) { 
            $update = Geografis::find($id);
            $update->update([
                $key[$i]=> $request->get($key[$i]),
            ]);
        }
        return $update;
    }
}
