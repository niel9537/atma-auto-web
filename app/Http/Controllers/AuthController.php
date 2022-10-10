<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Config;

class AuthController extends Controller
{
    function login(Request $request){
        $BASE_URL = env("BASE_URL");
        $response = Http::post("".$BASE_URL."auth/login", [
            'user_email' => $request->get('email'),
            'user_password' => $request->get('password')
        ]);
        $arr = json_decode($response,true);
        $token = $arr['token'][0]['token'];
        $request->session()->put('token',$token);
        return redirect('sparepart');
    }
}
