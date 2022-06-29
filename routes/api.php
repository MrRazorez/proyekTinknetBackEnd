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

Route::get("usertinknet", [userTinknetController::class, "validAccount"]);
Route::get("dataoffice", [crudController::class, "dataKantor"]);
Route::get("dataware", [crudController::class, "dataGudang"]);
Route::get("dataantv", [crudController::class, "dataAntv"]);
Route::get("dataindosiar", [crudController::class, "dataIndosiar"]);
Route::get("datasumberagung", [crudController::class, "dataSumberAgung"]);
Route::get("datamitra", [crudController::class, "dataMitra"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
