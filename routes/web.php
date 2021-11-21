<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzahouseController;

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

Route::GET('/', function () {
    return view('welcome');
});
Route::GET('/order', [PizzahouseController::class,'order'])->name('pizzas.order');
Route::POST('/order', [PizzahouseController::class,'store'])->name('pizzas.store');

//Admin Panel
Auth::routes(
    ['register' => false]
);

Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('/pizzas', [PizzahouseController::class,'index'])->name('admin.index')->middleware('auth');
Route::GET('/pizzas/payment-update/{id}', [PizzahouseController::class,'PaymentUpdate'])->where('id', '[0-9]+')->name('admin.PaymentUpdate')->middleware('auth');
Route::GET('/pizzas/fulfilled-update/{id}', [PizzahouseController::class,'fulfilledUpdate'])->where('id', '[0-9]+')->name('admin.fulfilledUpdate')->middleware('auth');
Route::GET('/pizzas/cancel-update/{id}', [PizzahouseController::class,'cancelUpdate'])->where('id', '[0-9]+')->name('admin.cancelUpdate')->middleware('auth');
Route::GET('/pizzas/orders/{id}/edit', [PizzahouseController::class,'edit'])->name('admin.edit')->where('id', '[0-9]+')->middleware('auth');
Route::PUT('/pizzas/orders/{id}/update', [PizzahouseController::class,'update'])->name('admin.update')->where('id', '[0-9]+')->middleware('auth');