<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Product Routes
//Create
Route::get('/products/create', [ProductController::class, 'add']);
Route::post('/products/create', [ProductController::class, 'store']);
//Read
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/detail/{id}', [ProductController::class, 'show']);
//Update
Route::get('/products/update/{id}', [ProductController::class, 'edit']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);
//Delete
Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);

//Category Routes
Route::get('/categories/create', [CategoryController::class, 'add']);
Route::post('/categories/create', [CategoryController::class, 'store']);
//Read
Route::get('/categories', [CategoryController::class, 'index']);
//Update
Route::get('/categories/update/{id}', [CategoryController::class, 'edit']);
Route::post('/categories/update/{id}', [CategoryController::class, 'update']);
//Delete
Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
