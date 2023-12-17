<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Http\Controllers\ItemsController;
use App\Models\Categories;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::apiResource('items', ItemsController::class);
//Route::apiResource('categories', CategoriesController::class);



Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/admin', function () {
    return view('admin');
});
