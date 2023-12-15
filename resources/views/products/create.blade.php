@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Item</h2>
        </div><br><br><br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div><br><br><br>
   
@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Brand:</strong>
                <input type="text" name="brand" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="text" name="img" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Unit Price:</strong>
                <input type="text" name="price" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="quantity" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
                <input type="text" name="status" class="form-control" >
            </div>
        </div><br><br>

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection