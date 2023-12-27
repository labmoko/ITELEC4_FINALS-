@extends('layouts.app')
 
@section('content')
@php
    $i = 0;
@endphp
<br>
<div class="container">
                <h1 style="font-size: 70px;">Chic Couture</h1>
            
<h5>Welcome to "Chic Couture," where fashion meets style in a symphony of elegance and comfort.<br> At our clothing store, we curate a collection that caters to the diverse tastes of our customers,<br> ensuring that every visit is an immersive experience into the world of fashion.</h5>
            <br><br><hr><br><br>

</div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="" style="float: right; margin-right: 200px;"> 
                <h6>Add products here:</h6>
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add Item</a>
            </div>
        </div>
    </div> <br><br><br>
        <center><h2>View Products</h2></center><br><br><br>
                            <!-- display as card -->
    <div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $product->img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">{{ $product->brand }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">P {{ $product->price }}</li>
                        <li class="list-group-item">{{ $product->status }}</li>
                    </ul>
                    <div class="card-body">
                    @if (Auth::user()->id == $product->user_id || Auth::user()->role == '1')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">ViewProduct</a>&nbsp;&nbsp; 
                            @if (Auth::user()->id == $product->user_id)
                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>&nbsp;&nbsp; 
                            @endif
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');"> 
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @else
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> 
                    @endif
                    </div> 
                </div>
            </div>
        @endforeach
    </div>
</div>
        <br><br><hr><br>
      
@endsection

