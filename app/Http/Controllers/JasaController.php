<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Config;
use Session;
class JasaController extends Controller
{

    function index()
    {
        $token = Session::get('token');
        if($token){
            $BASE_URL = env("BASE_URL", "http://localhost:5000/");
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("". $BASE_URL."service");
            //dd($data['data']);
            return view('jasa',['data'=>$data['data']]);

        }else{
            return redirect('/');
        }

    }

    function addJasa()
    {
        $token = Session::get('token');
        if($token){
            return view('addJasa');
        }else{
            return redirect('/');
        }
    }
    function editJasa($id)
    {
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."service/".$id."");
            return view('updateJasa',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }
    }
    function saveJasa(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."service/add", [
                'user_id' => $request->get('user_id'),
                'service_name' => $request->get('service_name'),
                'service_price' => $request->get('service_price'),
                'service_cost' => $request->get('service_cost'),
                'service_category' => $request->get('service_category')
            ]);
            return redirect('/jasa');
        }else{
            return redirect('/');
        }
    }
    function updateJasa(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");

        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' =>$token,
            ])->post("".$BASE_URL."service/edit", [
                'service_id' => $request->get('service_id'),
                'user_id' => $request->get('user_id'),
                'service_name' => $request->get('service_name'),
                'service_price' => $request->get('service_price'),
                'service_cost' => $request->get('service_cost'),
                'service_category' => $request->get('service_category')
            ]);
            return redirect('/jasa');
        }else{
            return redirect('/');
        }
    }
    function deletejasa(Request $request){
        $token = Session::get('token');
        $id = $request->get('service_id');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."service/delete/".$id."");
            return redirect('/jasa');
        }else{
            return redirect('/');
        }
    }
}
