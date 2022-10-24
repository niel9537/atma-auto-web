<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post("deletecustomer",[CustomerController::class,'deleteCustomer']);
Route::get("addcustomer",[CustomerController::class,'addCustomer']);
Route::post("savecustomer",[CustomerController::class,'saveCustomer']);
Route::get("editcustomer/{id}",[CustomerController::class,'editCustomer']);
Route::post("updatecustomer",[CustomerController::class,'updateCustomer']);
Route::get("customer",[CustomerController::class,'index']);
Route::get("pegawai",[PegawaiController::class,'index']);
Route::post("deletepegawai",[PegawaiController::class,'deletePegawai']);
Route::get("addpegawai",[PegawaiController::class,'addPegawai']);
Route::post("savepegawai",[PegawaiController::class,'savePegawai']);
Route::get("editpegawai/{id}",[PegawaiController::class,'editPegawai']);
Route::post("updatepegawai",[PegawaiController::class,'updatePegawai']);
Route::get("jasa",[JasaController::class,'index']);
Route::get("addjasa",[JasaController::class,'addJasa']);
Route::post("savejasa",[JasaController::class,'saveJasa']);
Route::get("editjasa/{id}",[JasaController::class,'editJasa']);
Route::post("updatejasa",[JasaController::class,'updateJasa']);
Route::post("deletejasa",[JasaController::class,'deleteJasa']);
Route::get("sparepart",[SparepartController::class,'index']);
//Route::get("/",[SparepartController::class,'index']);
Route::get("addsparepart",[SparepartController::class,'addSparepart']);
Route::get("editsparepart/{id}",[SparepartController::class,'editSparepart']);
Route::post("savesparepart",[SparepartController::class,'saveSparepart']);
Route::post("updatesparepart",[SparepartController::class,'updatesparepart']);
Route::post("deletesparepart",[SparepartController::class,'deletesparepart']);

Route::post("login",[AuthController::class,'login']);

Route::get("register",[AuthController::class,'register']);
Route::post("signup",[AuthController::class,'signup']);
Route::get("logout",[AuthController::class,'logout']);
