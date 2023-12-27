@extends('layouts.app')

@section('content')
    <h2>Specific Item Details</h2>
    <br><br><br>

    <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>

    <div class="row" style="background-color: white; border: 1px solid #ddd; border-radius: 5px; padding: 10px; margin-top: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <img src="{{ $product->img }}" alt="" class="img-fluid" style="width: 50%; max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 5px;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>

            <div class="form-group">
                <strong>Brand:</strong>
                {{ $product->brand }}
            </div>

            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>

            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>

            <div class="form-group">
                <strong>Status:</strong>
                {{ $product->status }}
            </div>
        </div>
    </div>

    <form action="{{ route('products.save', $product) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Save Product</button>
    </form>

@endsection
