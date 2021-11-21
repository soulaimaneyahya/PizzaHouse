@extends('layouts.app')

@section('content')

  <!-- main image & welcome text -->
  <section id="welcome">
    <div class="container-lg">
      <div class="row g-4 justify-content-center align-items-center">
        <div class="col-md-5 text-center text-md-start">
          <h1>
            <div class="display-2 title">Pizza House</div>
            <div class="display-5 text-muted">The North's Best Pizza</div>
          </h1>
          <a href="{{ route('pizzas.order') }}" class="btn btn-secondary btn-lg">Order</a>
        </div>
        <div class="col-md-5 text-center d-none d-md-block">
          <!-- tooltip -->
          <span class="tl" data-bs-placement="bottom" title="Pizza House">
            <img src="/img/pizza-house.png" class="img-fluid" alt="Pizza House">
          </span>
        </div>
      </div>
    </div>
  </section>
@endsection