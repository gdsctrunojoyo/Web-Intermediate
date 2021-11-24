<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TodoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'home'])->name('index');

Route::get('todo', [TodoController::class, 'index']);

Route::get('login', [IndexController::class, 'login'])->name('login');

// Route::get('shop', [IndexController::class, 'shopList'])->name('shop.list');
// Route::get('shop/detail/{id}/{slug}', [IndexController::class, 'shopDetail'])->name('shop.detail');

Route::group(['prefix' => 'barang', 'as' => 'shop.'], function(){
    Route::get('/', [IndexController::class, 'shopIndex'])->name('index');
    Route::get('detail/{id}/{slug}', [IndexController::class, 'shopDetail'])->name('detail');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
    Route::get('/', [IndexController::class, 'cartIndex'])->name('index');
    Route::get('checkout', [IndexController::class, 'cartCheckout'])->name('checkout');
});
