@extends('layouts.layout')

@section('content')
<section id="chechkout">
    <div class="container my-3">
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <div class="display-6 title mb-3">Order Pizza</div>
                <h5 class="sub-title mb-3 text-muted">Please enter your details below to complete your order</h5>
                @if($message = Session::get('Thanks'))
                    <div class="alert alert-success p-2">
                        {{ $message }}
                    </div>
                @endif
                <form action="{{ route('pizzas.store') }}" method="POST" class="form">
                    @CSRF
                    <div class="form-floating my-2">
                        <input type="text" name="name" class="form-control my-2 @if($errors->get('name')) is-invalid @endif" id="name" placeholder="Name" value="{{old('name')}}"/>
                        <label for="name">Name</label>
                        @if($errors->get('name'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('name') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" name="phone" class="form-control my-2 @if($errors->get('phone')) is-invalid @endif" id="phone" placeholder="Phone" value="{{old('phone')}}"/>
                        <label for="phone">Phone</label>
                        @if($errors->get('phone'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('phone') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" name="city" class="form-control my-2 @if($errors->get('city')) is-invalid @endif" id="city" placeholder="City" value="{{old('city')}}"/>
                        <label for="city">City</label>
                        @if($errors->get('city'))
                            <div class="alert alert-danger p-2">
                                @foreach($errors->get('city') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="my-2">
                        <select name="base" class="form-select base" id="base">
                            <option selected>Open this select menu</option>
                            <option value="thick">Thick</option>
                            <option value="thin & crispy">Thin & Crispy</option>
                            <option value="cheese crust">Cheese Crust</option>
                            <option value="garlic crust">Garlic Crust</option>
                        </select>
                    </div>
                    <div class="my-2">
                            <select name="type" class="form-select type" id="type">
                                <option selected>Choose Your Type</option>
                                <option value="1">small</option>
                                <option value="2">Medium</option>
                                <option value="3">big</option>
                            </select>
                    </div>
                    <label class="col-auto btn btn-secondary" id="price">
                        100$
                    </label>
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