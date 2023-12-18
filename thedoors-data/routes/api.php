<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;

Route::apiResource('items', ItemsController::class);
Route::apiResource('categories', CategoriesController::class);