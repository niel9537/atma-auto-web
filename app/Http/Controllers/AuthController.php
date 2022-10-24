<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Config;
use Session;
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
        if(!$token || $token == '') {
            return redirect('/');
        }
        $request->session()->put('token',$token);
        return redirect('sparepart');
    }
    function register(Request $request){
        return view('register');
    }
    function logout(){
        Session::flush();
        return redirect('/'); // removes all session data
    }
    function signup(Request $request){
        $BASE_URL = env("BASE_URL");
        $response = Http::post("".$BASE_URL."auth/register", [
            'user_name' => $request->get('user_name'),
            'user_email' => $request->get('user_email'),
            'user_password' => $request->get('user_password'),
            'user_fullname' => $request->get('user_fullname'),
            'user_address' => $request->get('user_address'),
            'user_phonenumber' => $request->get('user_phonenumber'),
            'user_role' => $request->get('user_role')
        ]);
        return redirect('/');
    }
}
