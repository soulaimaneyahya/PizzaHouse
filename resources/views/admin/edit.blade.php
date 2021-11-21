@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="d-inline">Edit order #{{$pizzas->id}}</h5>
                <a href="{{route('admin.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">          
                <div class="row justify-content-center">
                    <div class="col-md-8">     
                        <div class="card">
                            <div class="card-header">{{ __('Order details') }}</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{ __('You are logged in!') }}
                                <h3 class="my-3">Welcome back <span class="text-muted" >{{ucwords( Auth::user()->name) }}</span></h3>
                                <p><a href="{{ route('admin.index') }}" class="btn btn-secondary"><i class="bi bi-table"></i> &nbsp; Pizzas Orders</a></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>
            
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">     
                        <div class="card">
                            <div class="card-header">{{ __('Customer') }}</div>
            
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection