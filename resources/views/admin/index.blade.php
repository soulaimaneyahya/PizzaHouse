@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h5 class="card-header">{{ __('Pizzas Orders') }}</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Type</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Shipping</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($pizzas as $pizza)
                                <tr>
                                    <th scope="row">{{$pizza->id}}</th>
                                    <td>{{$pizza->name}}</td>
                                    <td>{{$pizza->city}}</td>
                                    <td>{{$pizza->phone}}</td>
                                    <td>{{$pizza->created_at}}</td>
                                    <td>{{$pizza->type}}</td>
                                    <td>{{$pizza->price}}$</td>
                                    <td><button type="button" class="btn btn-success btn-sm">Paid</button></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm">Unfulfilled</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection