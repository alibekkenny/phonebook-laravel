@extends('layouts.auth')

@section('title', 'Admin Login page')

@section('content')
    <h2 class="text-center">Admin panel</h2>
    <hr>
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Login form</h5>
        <div class="card-body">
            <form action="{{route('admin.login')}}" method="POST">
                @csrf
                @error('username')
                <div class="alert alert-danger mb-0 mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group mb-1">
                    <label for="email">Username</label>
                    <input class="form-control" type="text" id="username" name="username">
                </div>
                @error('password')
                <div class="alert alert-danger mb-0 mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
