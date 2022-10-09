<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparepartController;
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

Route::get("sparepart",[SparepartController::class,'index']);
//Route::get("/",[SparepartController::class,'index']);
Route::get("addsparepart",[SparepartController::class,'addSparepart']);
Route::get("editsparepart/{id}",[SparepartController::class,'editSparepart']);
Route::post("savesparepart",[SparepartController::class,'saveSparepart']);
Route::post("updatesparepart",[SparepartController::class,'updatesparepart']);
Route::post("deletesparepart",[SparepartController::class,'deletesparepart']);
