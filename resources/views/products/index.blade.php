@extends('layouts.app')
 
@section('content')
@php
    $i = 0;
@endphp
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>...</h2>
            </div><br><br><br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="pull-right"> 
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add Item</a>
            </div>
        </div>
    </div> <br><br><br>
    <table class="table table-bordered" style="background-color:white;">
        <tr style="background-color:whitesmoke;">
            <th>No.</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand }}</td>
            <td><img src="{{ $product->img }}" width="170px" height="120px"></td>
            <td>P {{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td style="color:blue;">{{ $product->status }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE') 
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection
