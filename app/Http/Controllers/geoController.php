<?php

namespace App\Http\Controllers;

use App\Models\Geografis;
use Illuminate\Http\Request;

class geoController extends Controller
{
    public function index(){
        $data = Geografis::first();

        $default = [
            new Geografis([
                'id' => '1',
                'kode_desa' => '3217082001',
                'tahun_pembentukan' => '1978',
                'dasar_hukum' => '141.1/KEP.18-PEM/1966',
                'tipologi' => 'PERINDUSTRIAN/JASA',
                'klasifikasi' => 'SWAKARYA',
                'kategori' => 'MULAM',
                'luas_wilayah' => '305.28 ha',
                'batas_utara' => 'Desa Utara',
                'batas_selatan' => 'Desa Selatan',
                'batas_timur' => 'Desa Timur',
                'batas_barat' => 'Desa Barat',
                'created_at' => '2024-08-21 07:59:59',
                'updated_at' => '2024-08-22 02:35:49',
            ]),
        ];
        if (config('app.is_demo')) {
            return $default[0];
        }

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
