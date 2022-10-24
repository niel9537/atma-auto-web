<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Config;
use Session;

class CustomerController extends Controller
{

    function index()
    {
        $token = Session::get('token');
        if($token){
            $BASE_URL = env("BASE_URL", "http://localhost:5000/");
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("". $BASE_URL."customer");
            //dd($data['data']);
            return view('customer',['data'=>$data['data']]);

        }else{
            return redirect('/');
        }

    }

    function addCustomer()
    {
        $token = Session::get('token');
        if($token){
            return view('addCustomer');
        }else{
            return redirect('/');
        }
    }
    function editCustomer($id)
    {
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."customer/".$id."");
            return view('updateCustomer',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }
    }
    function saveCustomer(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."customer/add", [
                'user_name' => $request->get('user_name'),
                'user_email' => $request->get('user_email'),
                'user_password' => $request->get('user_password'),
                'user_fullname' => $request->get('user_fullname'),
                'user_address' => $request->get('user_address'),
                'user_phonenumber' => $request->get('user_phonenumber')
            ]);
            return redirect('/customer');
        }else{
            return redirect('/');
        }
    }
    function updateCustomer(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."customer/edit", [
                'user_id' => $request->get('user_id'),
                'user_name' => $request->get('user_name'),
                'user_email' => $request->get('user_email'),
                'user_password' => $request->get('user_password'),
                'user_fullname' => $request->get('user_fullname'),
                'user_address' => $request->get('user_address'),
                'user_phonenumber' => $request->get('user_phonenumber')
            ]);
            return redirect('/customer');
        }else{
            return redirect('/');
        }
    }
    function deleteCustomer(Request $request){
        $token = Session::get('token');
        $id = $request->get('user_id');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."customer/delete/".$id."");
            return redirect('/customer');
        }else{
            return redirect('/');
        }
    }
}
