<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DiscountController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/deliveries',[DeliveryController::class, 'index']);
Route::get("/payments",[PaymentController::class, 'index']);
Route::get('/cart',[ProductController::class, 'index']);

Route::post('/discount',[ DiscountController::class,'check']);
Route::post('/registration',[ UserController::class,'store']);
Route::post('/new_order', [ OrderController::class,'create']);
