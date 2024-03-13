@extends('layouts.auth')

@section('title', 'Register page')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Registration form</h5>
        <div class="card-body">
            <form action="{{route('auth.register')}}" method="POST">
                @csrf
                @error('name')
                <div class="alert alert-danger mb-0 mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group mb-1">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
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
                <a class="link float-end" href="{{route('auth.login')}}">Already have an account</a>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Sign up</button>
            </form>
        </div>
    </div>
@endsection
