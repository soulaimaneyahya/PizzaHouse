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
Route::GET('/pizzas', [PizzahouseController::class,'index'])->name('pizzas.index');
Route::get('/pizzas/{id}', [PizzahouseController::class,'details'])->where('id', '[0-9]+')->name('pizzas.details');