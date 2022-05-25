<?php

use App\Http\Controllers\LogicController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\SubUnitController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('product')->group(function(){
    Route::get('list', [LogicController::class, 'showProductsListInUnit']);
    
    Route::get('', [ProductController::class, 'index']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::post('', [ProductController::class, 'store']);
    Route::put('{id}', [ProductController::class, 'update']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
    
    Route::get('{productId}/unit/{unitId}', [LogicController::class, 'showProductInUnit']);
});
Route::prefix('unit')->group(function(){
    Route::get('', [UnitController::class, 'index']);
    Route::get('{id}', [UnitController::class, 'show']);
    Route::post('', [UnitController::class, 'store']);
    Route::put('{id}', [UnitController::class, 'update']);
    Route::delete('{id}', [UnitController::class, 'destroy']);
});

Route::prefix('stock')->group(function(){
    Route::get('', [StockController::class, 'index']);
    Route::get('{id}', [StockController::class, 'show']);
    Route::post('', [StockController::class, 'store']);
    Route::put('{id}', [StockController::class, 'update']);
    Route::delete('{id}', [StockController::class, 'destroy']);
});



Route::get('convert/{fromUnitId}/{toUnitId}/{value}', [LogicController::class, 'convert']);