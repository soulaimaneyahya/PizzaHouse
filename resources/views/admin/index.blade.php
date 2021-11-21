@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <div class="card mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="d-inline">Pizzas Orders</h5>
                        <a href="{{route('home')}}"  class="btn btn-secondary">Back</a>
                    </div>
                    <div class="card-body px-4">
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
                                    <td>
                                        @php if(($pizza->payment) == "1"): @endphp
                                            <a href="{{url('/pizzas/payment-update',$pizza->id)}}" class="btn btn-success btn-sm">Paid</a>
                                        @php elseif(($pizza->payment) == "0"): @endphp
                                            <a href="{{url('/pizzas/payment-update',$pizza->id)}}" class="btn btn-danger btn-sm">Unpaid</a>
                                        @php endif; @endphp
                                    </td>
                                    <td>
                                        @php if(($pizza->fulfilled) == "1"): @endphp
                                            <a href="{{url('/pizzas/fulfilled-update',$pizza->id)}}" class="btn btn-secondary btn-sm">Fulfilled</a>
                                        @php elseif(($pizza->fulfilled) == "0"): @endphp
                                            <a href="{{url('/pizzas/fulfilled-update',$pizza->id)}}" class="btn btn-secondary btn-sm">Unfulfilled</a>
                                        @php endif; @endphp
                                    </td>
                                    <td>
                                        <!-- tooltip -->
                                        <span class="tl" data-bs-placement="bottom" title="Edit Order">
                                            <a href="{{route('admin.edit',$pizza->id)}}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        </span>
                                        <!-- tooltip -->
                                        <span class="tl" data-bs-placement="bottom" title="Print Order">
                                            <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i></button>
                                        </span>
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