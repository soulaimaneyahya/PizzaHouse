<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzahouseController extends Controller
{
    public function index(){
        return view('pizzas.index');
    }
    public function details($id){
        return view('pizzas.details',['id' => $id]);
    }
}
