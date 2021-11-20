@extends('layouts.layout')

@section('content')
    <div class="mt-5 text-center">
        <div class="col-md-12">
            <h3 class="">Pizzas ID: {{$pizzas->id}}</h3>
            <p>{{ $pizzas->name }} - {{ $pizzas->type }} - {{ $pizzas->price }}$</p>
        </div>
    </div>
@endsection