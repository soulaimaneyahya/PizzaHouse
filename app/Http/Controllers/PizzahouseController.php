<?php

namespace App\Http\Controllers;
use App\Models\pizzahouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PizzaHouseRequest;

class PizzahouseController extends Controller
{
    // Admin Side
    public function index(){
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
    function fulfilledUpdate($id){
        //get fulfilled with the help of pizza ID
        $pizza = DB::table('pizzahouses')
                    ->select('fulfilled')
                    ->where('id','=',$id)
                    ->first();

        //Check user fulfilled
        if($pizza->fulfilled == '1'):
            $fulfilled = '0';
        else:
            $fulfilled = '1';
        endif;

        //update pizza fulfilled
        $values = array('fulfilled' => $fulfilled );
        DB::table('pizzahouses')->where('id',$id)->update($values);
        return redirect('/pizzas');
    }
    function cancelUpdate($id){
        //get cancel with the help of pizza ID
        $pizza = DB::table('pizzahouses')
                    ->select('cancel')
                    ->where('id','=',$id)
                    ->first();

        //Check user cancel
        if($pizza->cancel == '1'):
            $cancel = '0';
        else:
            $cancel = '1';
        endif;

        //update pizza cancel
        $values = array('cancel' => $cancel );
        DB::table('pizzahouses')->where('id',$id)->update($values);
        return redirect('/pizzas');
    }
    public function update(PizzaHouseRequest $request , $id){
        $pizza = pizzahouse::findorFail($id);
        
        $pizza->name = request('name');
        $pizza->phone = request('phone');
        $pizza->city = request('city');
        $pizza->state = request('state');

        $pizza->save();

        return redirect('/pizzas/orders/' . $id . '/edit')->with('update','Update Customer');
    }
    public function edit($id){
    	$pizzas = pizzahouse::findOrFail($id);
        return view('admin.edit',['pizzas' => $pizzas]);
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