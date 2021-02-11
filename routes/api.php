<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoeController;
use App\Http\Controllers\Shoe_specificController;
use App\Http\Controllers\Shoe_categoryController;
use App\Http\Controllers\Shoe_brandController;
use App\Http\Controllers\Shoe_imageController;
use App\Http\Controllers\Shoe_sizeController;
use App\Http\Controllers\Shoe_colorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;


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

Route::prefix('v1')->group(function() {
    Route::apiResource('shoes', ShoeController::class);
    Route::apiResource('specifics', Shoe_specificController::class);
    Route::apiResource('categories', Shoe_categoryController::class);
    Route::apiResource('brands', Shoe_brandController::class);
    Route::apiResource('shoes_sizes', Shoe_sizeController::class);
    Route::apiResource('shoes_colors', Shoe_colorController::class);
    Route::apiResource('images', Shoe_imageController::class);
    Route::apiResource('sizes', SizeController::class);
    Route::apiResource('colors', ColorController::class);
    Route::post(
        '/list',
        [ShoeController::class, 'list']
    );
    Route::get(
        '/shoespecs/{id}',
        [Shoe_specificController::class, 'shoespecs']
    )->name('shoespecs');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
