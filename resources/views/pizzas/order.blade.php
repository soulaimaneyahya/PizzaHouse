@extends('layouts.layout')

@section('content')
<section id="chechkout" class="mb-5">
    <div class="container my-3">
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-md-10 text-center text-md-start">
                <div class="display-6 title mb-3">Order Pizza</div>
                <h5 class="sub-title mb-3 text-muted">Please enter your details below to complete your order</h5>
                @if($message = Session::get('Thanks'))
                    <div class="alert alert-success p-2">
                        {{ $message }}
                    </div>
                @endif
                <form action="{{ route('pizzas.store') }}" method="POST" class="form mb-5">
                    @CSRF
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control my-2 @if($errors->get('name')) is-invalid @endif" maxlength="30" id="name" placeholder="Name" value="{{old('name')}}"/>
                        @if($errors->get('name'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('name') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control my-2 @if($errors->get('phone')) is-invalid @endif" maxlength="10" id="phone" placeholder="Phone" value="{{old('phone')}}"/>
                        @if($errors->get('phone'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('phone') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col mb-2">
                        <input type="text" name="city" class="form-control my-2 @if($errors->get('city')) is-invalid @endif" maxlength="30" id="city" placeholder="City" value="{{old('city')}}"/>
                        @if($errors->get('city'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('city') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col mb-2">
                        <input type="text" name="state" class="form-control my-2 @if($errors->get('state')) is-invalid @endif" maxlength="30" id="state" placeholder="state" value="{{old('state')}}"/>
                        @if($errors->get('state'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('state') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-6 my-2">
                        <select name="base" class="form-select base" id="base" required>
                            <option value="1">Thick</option>
                            <option value="2">Thin & Crispy</option>
                            <option value="3">Cheese Crust</option>
                            <option value="4">Garlic Crust</option>
                        </select>
                    </div>
                    <div class="col-md-5 my-2">
                            <select name="type" class="form-select type" id="type" required>
                                <option value="1">small</option>
                                <option value="2" selected>Medium</option>
                                <option value="3">big</option>
                            </select>
                    </div>
                    <div class="col-md-1 my-2">
                        <span id="price">120$</span>
                    </div>
                </div>
                    <button type="submit" name="buy" class=" btn btn-secondary my-2">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    price = document.querySelector('#price')
    document.querySelector('.type').addEventListener('change', function() {
      if(this.value === '1') price.innerHTML = '100$'
      else if(this.value === '2') price.innerHTML = '120$'
      else if(this.value === '3') price.innerHTML = '150$'
    });
</script>

@endsection