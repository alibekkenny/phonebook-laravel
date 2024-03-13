@extends('layouts.auth')

@section('title', 'Login page')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Login form</h5>
        <div class="card-body">
            <form action="{{route('auth.login')}}" method="POST">
                @csrf
                @error('email')
                <div class="alert alert-danger mb-0 mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group mb-1">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>
                @error('password')
                <div class="alert alert-danger mb-0 mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <a class="link float-end" href="{{route('auth.register')}}">Don't have an account yet?</a>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
