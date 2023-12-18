@extends('layouts.app')
 
@section('content')
@php
    $i = 0;
@endphp
<br><br><br>
<div class="container">
            <div style="position: absolute; top: 50%; transform: translateY( -50%) ; ">
                <h1 style="font-size: 70px;">Chic Couture</h1>
            </div>
   
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px; margin-left:500px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://upload.wikimedia.org/wikipedia/commons/8/8a/Cat_eyes_2007-2.jpg" class="d-block w-100" alt="..." style="max-height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="https://c.pxhere.com/photos/e7/6d/kitten_cat_cute_kitten_kitty_cute_cat_curious_whisker_cute_animals-836276.jpg!d" class="d-block w-100" alt="..." style="max-height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="https://d.ibtimes.co.uk/en/full/1568900/feral-cat.jpg?w=736" class="d-block w-100" alt="..." style="max-height: 400px; object-fit: cover;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br><br><br>

<h5>Welcome to "Chic Couture," where fashion meets style in a symphony of elegance and comfort.<br> At our clothing store, we curate a collection that caters to the diverse tastes of our customers,<br> ensuring that every visit is an immersive experience into the world of fashion.</h5>
            <br><br><br><br><br><br><br><br><br>

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
        <center><h2>View Products</h2></center><br><hr><br><br><br><br>
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
                        <!-- <li class="list-group-item">{{ $product->quantity }}</li> -->
                    </ul>
                    <div class="card-body">
                    @if (Auth::user()->id == $product->user_id || Auth::user()->role == '1')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>&nbsp;&nbsp; 
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

