<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function onRegistration(Request $request){

        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        $formData = $request->all();
        $result = User::create($formData);

        if($result){
            return 'User Successfully Created.';
        }else{
            return 'User Not Created. Try Again!';
        }
    }
}
