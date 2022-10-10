<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Config;
use Session;
class SparepartController extends Controller
{

    function index()
    {
        $token = Session::get('token');
        if($token){
            $BASE_URL = env("BASE_URL", "http://localhost:5000/");
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("". $BASE_URL."sparepart");
            return view('sparepart',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }

    }

    function addSparepart()
    {
        $token = Session::get('token');
        if($token){
            return view('addSparepart');
        }else{
            echo 'Token is invalid';
        }
    }
    function editSparepart($id)
    {
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."sparepart/".$id."");
            return view('updateSparepart',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }
    }
    function saveSparepart(Request $request){
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        //dd($request->get('sparepart_code'));
        if($token){
            $client = new Client();
            $response =  $client->request("POST","".$BASE_URL."sparepart/add", [
            'multipart' => [
                [
                    'name'     => 'sparepart_code',
                    'contents' => $request->get('sparepart_code')
                ],
                [
                    'name'     => 'sparepart_type',
                    'contents' => $request->get('sparepart_type')
                ],
                [
                    'name'     => 'sparepart_merk',
                    'contents' => $request->get('sparepart_merk')
                ],                [
                    'name'     => 'sparepart_stock',
                    'contents' => $request->get('sparepart_stock')
                ],
                [
                    'name'     => 'sparepart_price',
                    'contents' => $request->get('sparepart_price')
                ],
                [
                    'name'     => 'sparepart_place',
                    'contents' => $request->get('sparepart_place')
                ]


            ],
        'headers' => [
            'Accept' => 'application/json',
            'Bearer' =>$token
            ]
        ]);
            //$data = Http::get('http://localhost:5000/sparepart');
            return redirect('/sparepart');
        }else{
            echo 'Token is invalid';
        }
    }
    function updateSparepart(Request $request){
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' => $token,
            ])->post("".$BASE_URL."sparepart/sparepart/edit", [
                'sparepart_code' => $request->get('sparepart_code'),
                'sparepart_type' => $request->get('sparepart_type'),
                'sparepart_merk' => $request->get('sparepart_merk'),
                'sparepart_stock' => $request->get('sparepart_stock'),
                'sparepart_price' => $request->get('sparepart_price'),
                'sparepart_place' => $request->get('sparepart_place'),
                'sparepart_id' => $request->get('sparepart_id')
            ]);
            $data = Http::get('http://localhost:5000/sparepart');
            return view('sparepart',['data'=>$data['data']]);
        }else{
            echo 'Token is invalid';
        }
    }
    function deletesparepart(Request $request){
        $token = Session::get('token');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $response = Http::withHeaders([
                'Bearer' => $token,
            ])->post("".$BASE_URL."sparepart/delete", [
                'sparepart_id' => $request->get('sparepart_id')
            ]);
            return redirect('/sparepart');
        }else{
            echo 'Token is invalid';
        }
    }
}
