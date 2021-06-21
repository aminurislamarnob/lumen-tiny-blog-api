<?php

namespace App\Http\Controllers;

use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller{
    
    public function onLogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $countUserName = User::where(['username'=>$username, 'password'=>$password])->count();

        if($countUserName == 1){
            $key = env('TOKEN_KEY');
            
            $payload = array(
                "site" => "http://localhost:8000/",
                "username" => $username,
                "iat" => time(),
                "exp" => time()+120 // 1 hour alive token
            );

            $jwt = JWT::encode($payload, $key);

            return response()->json([
                'token' => $jwt,
                'status' => 'Login Success'
            ]);
        }else{
            return "Username or Password not matched!";
        }
    }
}
