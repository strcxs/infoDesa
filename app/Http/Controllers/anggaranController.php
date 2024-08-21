<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class anggaranController extends Controller
{
    public function index(){
        $data = Anggaran::first();

        return $data;
    }
    public function update(Request $request,$id){
        $key = collect($request->all())->keys();

        for ($i=0; $i < count($key); $i++) { 
            $update = Anggaran::find($id);
            $update->update([
                $key[$i]=> $request->get($key[$i]),
            ]);
        }
        return $update;
    }
}
