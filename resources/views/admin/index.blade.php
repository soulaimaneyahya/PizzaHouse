@extends('layouts.layout')

@section('content')
    <div class="mt-5 text-center">
        <div class="col-md-12">
            <h3 class="my-4">Pizzas</h3>
            @foreach($pizzas as $pizza)
                <p>{{ $pizza->name }} - {{ $pizza->price }}$</p>
            @endforeach
        </div>
    </div>
@endsection