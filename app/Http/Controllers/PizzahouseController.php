<?php

namespace App\Http\Controllers;
use App\Models\pizzahouse;
use App\Http\Requests\PizzaHouseRequest;
use Illuminate\Http\Request;

class PizzahouseController extends Controller
{
    public function index(){
        // $pizzas = pizzahouse::all();
        // $pizzas = pizzahouse::orderBy('name','asc')->get();
        // $pizzas = pizzahouse::where('type','medium')->get();
        $pizzas = pizzahouse::latest()->get();
        return view('admin.index',['pizzas' => $pizzas]);
    }
    public function details($id){
        $pizzas = pizzahouse::findOrFail($id);
        return view('admin.details',['pizzas' => $pizzas]);
    }
    public function order(){
        return view('pizzas.order');
    }
    public function store() {
        $pizza = new pizzahouse();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');

        $pizza->phone = request('phone');
        $pizza->city = request('city');

        // get price depend on quantity type
        if(request('type') === '1' ):
            $pizza->price = '38';
        elseif(request('type') === '2' ):
            $pizza->price = '76';
        else:
            $pizza->price = '99';
        endif;
    
        $pizza->save();
        return redirect('/order')->with('Thanks', 'Thanks for your order!');
    
      }
}
