<?php

use App\Http\Controllers\dummyApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/getdata", [dummyApiController::class, 'getdata']);
Route::post("/postdata", [dummyApiController::class, 'postdata']);
Route::put("/putdata", [dummyApiController::class, 'putdata']);
Route::get("/search/{name}", [dummyApiController::class, 'search']);
Route::delete("/delete/{id}", [dummyApiController::class, 'delete']);

//validations
Route::post("/savedata", [dummyApiController::class, 'savedata']);
