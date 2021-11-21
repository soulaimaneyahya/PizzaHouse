@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="d-inline">Edit Pizza Order #{{$pizzas->id}}</h5>
                <a href="{{route('admin.index')}}" class="btn btn-main">Back</a>
            </div>
            <div class="card-body">          
                <div class="row justify-content-center">
                    <div class="col-md-8">     
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6>Pizza ref #{{$pizzas->id}}</h6>
                                <div class="align-items-center">
                                    <h6 class="btn btn-success px-2 py-1 d-inline" style="cursor: auto">{{$pizzas->price}}$</h6>
                                    @php if(($pizzas->cancel) == "0"): @endphp
                                        <a href="{{url('/pizzas/cancel-update',$pizzas->id)}}" class="btn btn-secondary btn-sm px-2 py-1">Cancel Order</a>
                                    @php elseif(($pizzas->cancel) == "1"): @endphp
                                        <a class="btn btn-main btn-sm" style="cursor: auto">ORDER CLOSED</a>
                                    @php endif; @endphp
                                </div>
                            </div>
            
                            <div class="px-3 py-2">
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
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#customerInfos"><i class="bi bi-pencil-square"></i></a>
                                        </span>
                                    </div>
                                    @if($message = Session::get('update'))
                                        <div class="alert alert-success my-2 p-2 text-center">
                                            {{ $message }}
                                        </div>
                                    @endif
                                    <ul class="CustomerInfos py-1 px-2" style="opacity: 0.6;">
                                        <li>{{ucwords($pizzas->name)}}</li>
                                        <li>{{$pizzas->phone}}</li>
                                        <li>{{ucwords($pizzas->city)}}</li>
                                        <li>{{ucwords($pizzas->state)}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="customerInfos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Customer Informations</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <form action="{{ route('admin.update',$pizzas->id) }}" method="POST" class="form">
                                @CSRF
                                <input type="hidden" name="_method" value="PUT" />
                                    <div class="justify-content-center p-2">
                                        <div class="col">
                                            <input type="text" name="name" class="form-control my-2 @if($errors->get('name')) is-invalid @endif" maxlength="30" id="name" placeholder="Name" value="{{ucwords($pizzas->name)}}"/>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="phone" class="form-control my-2 @if($errors->get('phone')) is-invalid @endif" maxlength="10" id="phone" placeholder="Phone" value="{{ucwords($pizzas->phone)}}"/>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="city" class="form-control my-2 @if($errors->get('city')) is-invalid @endif" maxlength="30" id="city" placeholder="City" value="{{ucwords($pizzas->city)}}"/>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="state" class="form-control my-2 @if($errors->get('state')) is-invalid @endif" maxlength="30" id="state" placeholder="State" value="{{ucwords($pizzas->state)}}"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="EditCustomerInfos" class="btn btn-main">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
$(document).ready(function() {



});
</script>
@endsection