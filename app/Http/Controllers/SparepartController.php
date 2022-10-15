<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            return redirect('/');
        }

    }

    function addSparepart()
    {
        $token = Session::get('token');
        if($token){
            return view('addSparepart');
        }else{
            return redirect('/');
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
        $client_id = env("CLIENT_ID", "");
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            if($request->file('file')){
                $client = new Client();
                $image = $request->file('file')->getPathname();

                $file = $request->file('file');
                $file_path = $file->getPathName();
                //$client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                            'authorization' => $client_id,
                            'content-type' => 'application/x-www-form-urlencoded',
                        ],
                    'form_params' => [
                            'image' => base64_encode(file_get_contents($request->file('file')->path($file_path))),
                            'contents' => base64_encode(file_get_contents($request->file('file')))
                        ],
                    ]);
                $data['file'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
                if($response->getStatusCode() == 200){
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
                            ],
                            [
                                'name'     => 'sparepart_image',
                                'contents' => $data['file']
                            ]

                        ],
                        'headers' => [
                            'Accept' => 'application/json',
                            'Bearer' =>$token
                            ]
                        ]);
                        return redirect('/sparepart');
                }
            }else{
                return redirect('/sparepart');
            }
        }else{
            return redirect('/');
        }
    }
    function updateSparepart(Request $request){
        $token = Session::get('token');
        $client_id = env("CLIENT_ID", "");
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            if($request->file('file')){
                $client = new Client();
                $image = $request->file('file')->getPathname();

                $file = $request->file('file');
                $file_path = $file->getPathName();
                //$client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                            'authorization' => $client_id,
                            'content-type' => 'application/x-www-form-urlencoded',
                        ],
                    'form_params' => [
                            'image' => base64_encode(file_get_contents($request->file('file')->path($file_path))),
                            'contents' => base64_encode(file_get_contents($request->file('file')))
                        ],
                    ]);
                $data['file'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
                if($response->getStatusCode() == 200){
                    $response =  $client->request("POST","".$BASE_URL."sparepart/edit", [
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
                            ],
                            [
                                'name'     => 'sparepart_id',
                                'contents' => $request->get('sparepart_id')
                            ],
                            [
                                'name'     => 'sparepart_image',
                                'contents' => $data['file']
                            ]

                        ],
                        'headers' => [
                            'Accept' => 'application/json',
                            'Bearer' =>$token
                            ]
                        ]);
                        return redirect('/sparepart');
                }
            }else{
                return redirect('/sparepart');
            }
        }else{
            return redirect('/');
        }
    }
    function deletesparepart(Request $request){
        $token = Session::get('token');
        $id = $request->get('sparepart_id');
        $BASE_URL = env("BASE_URL", "http://localhost:5000/");
        if($token){
            $data = Http::withHeaders([
                'Bearer' => $token,
            ])->get("".$BASE_URL."sparepart/delete/".$id."");
            return redirect('/sparepart');
        }else{
            return redirect('/');
        }
    }
}
