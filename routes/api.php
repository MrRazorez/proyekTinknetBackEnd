<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userTinknetController;
use App\Http\Controllers\crudController;

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

Route::post("usertinknet", [userTinknetController::class, "validAccount"]);
Route::get("databarang", [crudController::class, "index"]);
Route::post("databarang/store", [crudController::class, "store"]);
Route::get("databarang/show/{id}", [crudController::class, "show"]);
Route::post("databarang/update/{id}", [crudController::class, "update"]);
Route::get("databarang/delete/{id}", [crudController::class, "destroy"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
