<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class anggaranController extends Controller
{
    public function index(){
        $data = Anggaran::first();

        $default = new Anggaran([
            'id' => 1,
            'pendapatan' => '150000001',
            'pengeluaran' => '5000000',
            'belanja' => '2000000',
            'penerimaan' => '250000',
            'created_at' => '2024-08-21 07:08:00',
            'updated_at' => '2024-08-23 06:10:55'
        ]);
        
        if (config('app.is_demo')) {
            return $default;
        }

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
