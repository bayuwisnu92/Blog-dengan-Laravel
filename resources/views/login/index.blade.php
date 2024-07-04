@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <h1 class="fb-logo">Blog</h1>
            <h2 class="fb-tagline text-white">Selamat Datang</h2>
            @if(session()->has('succes'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('succes') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>
        <div class="col-md-4 offset-md-2">
            <div class="card p-4">
                <form id="loginForm" action="/login" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email or Phone" name="email" value="{{ old('email') }}" autofocus required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    <div class="text-center mt-3">
                        <a href="#" class="small">Forgotten password?</a>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="button" class="btn btn-success">Create New Account</button>
                    </div>
                </form>
            </div>
            <p class="mt-4 small"><a href="#">Create a Page</a> for a celebrity, band or business.</p>
        </div>
    </div>
</div>
@endsection
