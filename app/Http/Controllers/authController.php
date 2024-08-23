<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function getUser(){
        $data = Auth::first();

        return $data;
    }
    public function auth(Request $request) {
        $validator = Validator::make($request->all(),[
            'username'     => 'required',
            'password'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),442);
        }
        
        $username = Auth::where('username','=',$request->username)->first();
        
        if ($username!=null) {
            $decrypt_pass = $username->password;
            if (password_verify(md5($request->password), $decrypt_pass)){
                $data = [
                    'login' => true,
                    'id' => $username->id,
                    'message' => 'login Success',
                ];
                return response()->json($data, 200);
            }
            return response()->json(['login'=>false], 200);
        }else{
            return response()->json(['login'=>false], 200);
        }
    }
    public function change(Request $request,$id){
        $username = Auth::find(1);
        $decrypt_pass = $username->password;
        if(password_verify(md5($request->current_password), $decrypt_pass)){
            $key = collect($request->all())->keys();
            $hash = md5($request->password);
            
    
            for ($i=0; $i < count($key); $i++) { 
                $update = Auth::find($id);
                if ($key[$i]==="password") {
                    $update->update([
                        "password"=> password_hash($hash, PASSWORD_DEFAULT)
                    ]);    
                }else if(($key[$i]==="username")){
                    $update->update([
                        $key[$i]=> $request->get($key[$i]),
                    ]);
                }
            }
            return response()->json(['update'=>true], 200);
        }
        return response()->json(['update'=>false,'message'=>'The current password you entered does\'nt match. Please try again.'], 200);
    }
}
