<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Config;
class SparepartController extends Controller
{
    //
    function index()
    {
        $data = Http::get('http://localhost:5000/sparepart');
        return view('sparepart',['data'=>$data['data']]);
    }

    function addSparepart()
    {

        return view('addSparepart');
    }
    function editSparepart($id)
    {
        $data = Http::get("http://localhost:5000/sparepart/".$id."");
        //dd($data);
        return view('updateSparepart',['data'=>$data['data']]);
    }
    function saveSparepart(Request $request){
        //$input = $request->get('sparepart_code');
        // dd($input);
        $BASE_URL = config('BASE_URL');
        $response = Http::post('http://localhost:5000/sparepart/add', [
            'sparepart_code' => $request->get('sparepart_code'),
            'sparepart_type' => $request->get('sparepart_type'),
            'sparepart_merk' => $request->get('sparepart_merk'),
            'sparepart_stock' => $request->get('sparepart_stock'),
            'sparepart_price' => $request->get('sparepart_price'),
            'sparepart_place' => $request->get('sparepart_place')
        ]);
        //dd($response->ok());
        $data = Http::get('http://localhost:5000/sparepart');
        return view('sparepart',['data'=>$data['data']]);
    }
    function updateSparepart(Request $request){
        //$input = $request->get('sparepart_code');
        // dd($input);
        $BASE_URL = config('BASE_URL');
        $response = Http::post('http://localhost:5000/sparepart/edit', [
            'sparepart_code' => $request->get('sparepart_code'),
            'sparepart_type' => $request->get('sparepart_type'),
            'sparepart_merk' => $request->get('sparepart_merk'),
            'sparepart_stock' => $request->get('sparepart_stock'),
            'sparepart_price' => $request->get('sparepart_price'),
            'sparepart_place' => $request->get('sparepart_place'),
            'sparepart_id' => $request->get('sparepart_id')
        ]);
        //dd($response->ok());
        $data = Http::get('http://localhost:5000/sparepart');
        return view('sparepart',['data'=>$data['data']]);
    }
    function deletesparepart(Request $request){
        //$input = $request->get('sparepart_code');
        // dd($input);
        $BASE_URL = config('BASE_URL');
        $response = Http::post('http://localhost:5000/sparepart/delete', [
            'sparepart_id' => $request->get('sparepart_id')
        ]);
        //dd($response->ok());
        $data = Http::get('http://localhost:5000/sparepart');
        return view('sparepart',['data'=>$data['data']]);
    }
}
