@extends('layouts.app')

@section('content')
<br><br>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <h3>Register User</h3><br>
        <form method="POST" action="{{ route('register') }}">
          @csrf
a
          <!-- Name input -->
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
              placeholder="Enter your name" value="{{ old('name') }}" required autocomplete="name" />
            <label class="form-label" for="name">Name</label>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter email address" value="{{ old('email') }}" required autocomplete="email" />
            <label class="form-label" for="email">Email address</label>

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="Enter password" required autocomplete="new-password" />
            <label class="form-label" for="password">Password</label>

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Confirm Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg"
              placeholder="Confirm password" required autocomplete="new-password" />
            <label class="form-label" for="password-confirm">Confirm Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection
