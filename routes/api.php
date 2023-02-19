<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\SellerApiController;
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

//Read
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function() {

    //Product Create
    Route::post('/products', [ProductApiController::class, 'store']);
    //Product Update
    Route::put('/products/{id}', [ProductApiController::class, 'update']);
    //Product Delete
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);

    //Category Create
    Route::post('/categories', [CategoryApiController::class, 'store']);
    //Category Read
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
    //Category Update
    Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
    //Category Delete
    Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

    //Seller Create
    Route::post('/sellers', [SellerApiController::class, 'store']);
    //Seller Read
    Route::get('/sellers', [SellerApiController::class, 'index']);
    Route::get('/sellers/{id}', [SellerApiController::class, 'show']);
    //Seller Update
    Route::put('/sellers/{id}', [SellerApiController::class, 'update']);
    //Seller Delete
    Route::delete('/sellers/{id}', [SellerApiController::class, 'destroy']);

});