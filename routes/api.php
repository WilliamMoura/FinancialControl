<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancialController;
use App\Models\User;
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
Route::get('teste', function (Request $request) {
    return response('sucesso2');
});

Route::resource('customer', CustomerController::class);
Route::resource('financial', FinancialController::class);
Route::apiResource('category', CategoryController::class);
Route::post('user', function(Request $request) {
    $request->merge(['password' => Hash::make($request->password)]);

    return User::create($request->all());
});
