@extends('layouts.app')

@section('content')
<div class="container">
    <main class="inner cover"><br>
        <h1 class="cover-heading">Tindahan</h1><hr>
        <p class="lead">Step into a world of style and sophistication, where every stitch and fabric weave together to tell a unique story. </p>
        <p class="lead">
        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- {{ __('You are logged in!') }} --><br>
                            <p class="lead">Hi, {{ $name }}</p>
                            </div>
        <div class="container">
            <div class="row justify">
                <div class="col-md-8">

                            <h3>To do:</h3>
                            <ul>
                                <li><a class="nav-link" href="{{ route('products.index') }}">View Products</a></li>
                                <li><a class="nav-link" href="{{ route('products.create') }}">Add a Product</a></li>
                                <li><a class="nav-link" href="{{ route('user.savedProducts') }}">View Saved Products</a></li><br><br>
                                <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="max-width: 600px; margin-left:600px; top: 50%; transform: translateY( -65%) ; ">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://upload.wikimedia.org/wikipedia/commons/8/8a/Cat_eyes_2007-2.jpg" class="d-block w-100" alt="..." style="max-height: 370px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="https://c.pxhere.com/photos/e7/6d/kitten_cat_cute_kitten_kitty_cute_cat_curious_whisker_cute_animals-836276.jpg!d" class="d-block w-100" alt="..." style="max-height: 370px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="https://d.ibtimes.co.uk/en/full/1568900/feral-cat.jpg?w=736" class="d-block w-100" alt="..." style="max-height: 370px; object-fit: cover;">
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
            </main>
        </div>
@endsection
