@extends('layouts.main')

@section('container')

    @if (session()->has('success'))

    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>

    @endif

<div class="row justify-content-center">
    <div class="col-md-4 ">

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal d-flex justify-content-center">Please Login</h1>
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="Email" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control @error('name') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
              @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>

        </main>

    </div>
</div>

@endsection
