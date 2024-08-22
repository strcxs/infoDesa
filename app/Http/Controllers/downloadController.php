<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class downloadController extends Controller
{
    public function download(){
        $filePath = storage_path('app/public/download/SISPEK.apk');
        $headers = [
            'Content-Type' => 'application/apk',
        ];
        return response()->download($filePath, 'APLIKASI_SISPEK.apk', $headers);

    }
}
