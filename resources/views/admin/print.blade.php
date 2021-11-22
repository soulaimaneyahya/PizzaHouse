<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="shortcut icon" href="https://icon-library.com/images/icon-png-circle/icon-png-circle-29.jpg" type="image/x-icon">
        
        {{-- bootstrap 5 cdn  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- bootstrap 5 icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/main.css">
        <title>Invoice for #{{$pizzas->id}} - Pizza House</title>
    </head>
    <body>

<div class="container mt-5">

    <!-- Data list table --> 
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center @php if(($pizzas->cancel) == 1): echo 'trashed'; endif;  @endphp">
            <h5 class="d-inline">Pizza House #{{$pizzas->id}}</h5>
            <img src="" alt="Pizza House" />
        </div>
        <div class="card-body">
            <div class="card my-2">
                <div class="card-body">
                    <div class="align-items-center">
                        <h6 class="btn btn-secondary px-2 py-1 d-inline" style="cursor: auto">{{$pizzas->price}}$</h6>
                        @php if(($pizzas->cancel) == "0"): @endphp
                            <p class="btn btn-secondary btn-sm px-2 py-1 d-inline" style="cursor: auto">Order Approved</p>
                        @php elseif(($pizzas->cancel) == "1"): @endphp
                            <p class="btn btn-main btn-sm" style="cursor: auto">ORDER CLOSED</p>
                        @php endif; @endphp
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                  <p class="card-title my-0">{{$pizzas->name}}</p>
                  <p class="card-title my-0">{{$pizzas->phone}}</p>
                  <p class="card-title">{{$pizzas->city}}</p>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                  <h6 class="card-title my-2">Pizza Details</h6>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Base</th>
                        <th scope="col">Toppings</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$pizzas->id}}</th>
                        <td>{{$pizzas->type}}</td>
                        <td>{{$pizzas->base}}</td>
                        <td>
                            @if($pizzas->toppings)
                                @foreach($pizzas->toppings as $topping)
                                    <p class="m-0">{{ $topping }}</p>
                                @endforeach
                            @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            
        </div>
    </div>

<script type="text/javascript">
    window.onload = function() {
        window.print();
    };
</script>