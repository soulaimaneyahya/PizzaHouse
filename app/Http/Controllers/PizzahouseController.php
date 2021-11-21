<?php

namespace App\Http\Controllers;
use App\Models\pizzahouse;
use App\Http\Requests\PizzaHouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzahouseController extends Controller
{
    // Admin Side
    public function index(){
        // $pizzas = pizzahouse::all();
        // $pizzas = pizzahouse::orderBy('name','asc')->get();
        // $pizzas = pizzahouse::where('type','medium')->get();
        // $pizzas = pizzahouse::latest()->get();
    	$pizzas = pizzahouse::join('type', 'pizzahouses.type', '=', 'type.id')
        ->join('base', 'base.id', '=', 'pizzahouses.base')
        ->get(['pizzahouses.*', 'type.type', 'base.base']);

        return view('admin.index',['pizzas' => $pizzas]);
    }

    function PaymentUpdate($id)
    {
        //get payment with the help of pizza ID
        $pizza = DB::table('pizzahouses')
                    ->select('payment')
                    ->where('id','=',$id)
                    ->first();

        //Check user payment
        if($pizza->payment == '1'):
            $payment = '0';
        else:
            $payment = '1';
        endif;

        //update pizza payment
        $values = array('payment' => $payment );
        DB::table('pizzahouses')->where('id',$id)->update($values);
        return redirect('/pizzas');
    }

    // Customer Side
    public function order(){
        return view('pizzas.order');
    }
    public function store(PizzaHouseRequest $request) {
        $pizza = new pizzahouse();

        $pizza->name = request('name');
        $pizza->phone = request('phone');
        $pizza->city = request('city');
        $pizza->state = request('state');
        $pizza->base = request('base');
        $pizza->type = request('type');
        $pizza->toppings = request('toppings');

        // get price depend on quantity type
        if(request('type') === '1' ):
            $pizza->price = '100';
        elseif(request('type') === '2' ):
            $pizza->price = '120';
        else:
            $pizza->price = '150';
        endif;
    
        $pizza->save();
        return redirect('/order')->with('Thanks', 'Thanks for your order!');
    
      }
}