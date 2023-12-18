<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/plant', [PlantController::class, 'index']);
Route::get('/plant/{id}',[PlantController::class,'getOne']);
Route::post('/plant',[PlantController::class,'create']);
Route::put('/plant/{id}',[PlantController::class,'update']);