<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\ProdukController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:sanctum'], function(){
    //crud student
    Route::post('/create', [FormController::class, 'create']);
    Route::get('/edit/{id}', [FormController::class, 'edit']);
    Route::post('/edit/{id}', [FormController::class, 'update']);
    Route::get('/delete/{id}', [FormController::class, 'delete']);

    //crud score with relation to student
    Route::post('/create-produk-supplier', [ProdukController::class, 'create']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

//crud score with relation to student
Route::post('/create-produk-supplier', [ProdukController::class, 'create']);
Route::get('/edit-produk-supplier/{id}', [ProdukController::class, 'edit']);
Route::get('/delete-produk-supplier/{id}', [ProdukController::class, 'delete']);

Route::post('/login', [AuthController::class, 'login']);

