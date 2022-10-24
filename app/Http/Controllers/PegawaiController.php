<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Config;
use Session;

class PegawaiController extends Controller
{

    function index()
    {
        $token = Session::get('token');
        if($token){
            $BASE_URL = env("BASE_URL", "http://localhost:5000/");
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("". $BASE_URL."employee");
            //dd($data['data']);
            return view('pegawai',['data'=>$data['data']]);

        }else{
            return redirect('/');
        }

    }

    function addPegawai()
    {
        $token = Session::get('token');
        if($token){
            return view('addPegawai');
        }else{
            return redirect('/');
        }
    }
    function editPegawai($id)
    {
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."employee/".$id."");
            return view('updatePegawai',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }
    }
    function savePegawai(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."employee/add", [
                'user_name' => $request->get('user_name'),
                'user_email' => $request->get('user_email'),
                'user_password' => $request->get('user_password'),
                'user_fullname' => $request->get('user_fullname'),
                'user_address' => $request->get('user_address'),
                'user_phonenumber' => $request->get('user_phonenumber'),
                'user_role' => $request->get('user_role')
            ]);
            return redirect('/pegawai');
        }else{
            return redirect('/');
        }
    }
    function updatePegawai(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."employee/edit", [
                'user_id' => $request->get('user_id'),
                'user_name' => $request->get('user_name'),
                'user_email' => $request->get('user_email'),
                'user_password' => $request->get('user_password'),
                'user_fullname' => $request->get('user_fullname'),
                'user_address' => $request->get('user_address'),
                'user_phonenumber' => $request->get('user_phonenumber'),
                'user_role' => $request->get('user_role')
            ]);
            return redirect('/pegawai');
        }else{
            return redirect('/');
        }
    }
    function deletePegawai(Request $request){
        $token = Session::get('token');
        $id = $request->get('user_id');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."employee/delete/".$id."");
            return redirect('/pegawai');
        }else{
            return redirect('/');
        }
    }
}
