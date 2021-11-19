@extends('layouts.layout')

@section('content')
    <div class="mt-5 text-center">
        <div class="col-md-12">
            <h3 class="">Pizzas</h3>
            <h5 class="">{{ $name }}</h5>
            @foreach($data as $item)
                <p>{{ $loop->index }}: {{ $item['name'] }} - {{ $item['username'] }} - {{ $item['email'] }}</p>
            @endforeach

        </div>
    </div>
@endsection