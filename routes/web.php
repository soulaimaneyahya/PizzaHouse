<?php

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

Route::get('/pizzas', function () {
    $name = request('name');
    $data = [
        ['name'=>'soulaimane yahya',
        'username'=>'soulaimane.yh',
        'email'=>'soulaimane.yahya@usmba.ac.ma',],
        ['name'=>'zakaria yahya',
        'username'=>'zakaria.yh',
        'email'=>'yakaria.yahya@uabms.ac.ma',],
        ['name'=>'omnia el faidli',
        'username'=>'omnia.el',
        'email'=>'omnia.el@gmail.com'],
    ];
    return view('pizzas',[
        'data' => $data,
        'name' => $name,
    ]);
});
