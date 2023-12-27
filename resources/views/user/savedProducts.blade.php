@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Saved Products</h2>
    <br><hr><br><br>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 d-inline-block">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $product->img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text">{{ $product->brand }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">P {{ $product->price }}</li>
                            <li class="list-group-item">{{ $product->status }}</li>
                            <li class="list-group-item">{{ $product->quantity }}</li>
                        </ul>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
