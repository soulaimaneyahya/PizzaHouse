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

Route::get('/', function () {
    return view('welcome');
});
Route::GET('/order', [PizzahouseController::class,'order'])->name('pizzas.order');
Route::POST('/order', [PizzahouseController::class,'store'])->name('pizzas.store');

//Admin Panel
Route::GET('/pizzas', [PizzahouseController::class,'index'])->name('admin.index');
Route::GET('/pizzas/{id}', [PizzahouseController::class,'details'])->where('id', '[0-9]+')->name('admin.details');