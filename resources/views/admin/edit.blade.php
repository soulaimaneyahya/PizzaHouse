<style>

</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="d-inline">Edit Pizza Order #{{$pizzas->id}}</h5>
                <a href="{{route('admin.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">          
                <div class="row justify-content-center">
                    <div class="col-md-8">     
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6>Pizza ref #{{$pizzas->id}}</h6>
                                <h6 class="btn-success px-2 py-1">{{$pizzas->price}}$</h6>
                            </div>
            
                            <div class="card p-2">
                                <table class="table table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">Order ref</th>
                                        <th scope="col">Ordered at</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Shipping status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>#{{$pizzas->id}}</td>
                                        <td>{{$pizzas->created_at}}</td>
                                        <td>
                                            @php if(($pizzas->payment) == "1"): @endphp
                                                <a href="{{url('/pizzas/payment-update',$pizzas->id)}}" class="btn btn-success btn-sm">Paid</a>
                                            @php elseif(($pizzas->payment) == "0"): @endphp
                                                <a href="{{url('/pizzas/payment-update',$pizzas->id)}}" class="btn btn-danger btn-sm">Unpaid</a>
                                            @php endif; @endphp
                                        </td>
                                        <td>
                                            @php if(($pizzas->fulfilled) == "1"): @endphp
                                                <a href="{{url('/pizzas/fulfilled-update',$pizzas->id)}}" class="btn btn-secondary btn-sm">Fulfilled</a>
                                            @php elseif(($pizzas->fulfilled) == "0"): @endphp
                                                <a href="{{url('/pizzas/fulfilled-update',$pizzas->id)}}" class="btn btn-secondary btn-sm">Unfulfilled</a>
                                            @php endif; @endphp
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="card my-3">
                            <div class="card-header">{{ __('Pizza details') }}</div>
            
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">     
                        <div class="card">
                            <div class="card-header">{{ __('Customer') }}</div>
            
                            <div class="card-body">
                                <div class="p-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Customer Informations</span>
                                        <!-- tooltip -->
                                        <span class="tl" data-bs-placement="bottom" title="Edit Customer">
                                            <a href="" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                        </span>
                                    </div>
                                    <ul class="CustomerInfos p-3" style="opacity: 0.5;">
                                        <li>{{$pizzas->name}}</li>
                                        <li>{{$pizzas->phone}}</li>
                                        <li>{{$pizzas->city}}</li>
                                        <li>{{$pizzas->state}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection