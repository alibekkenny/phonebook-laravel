@extends('layouts.admin')

@section('title', 'Edit user page')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">User edit</h5>
        <div class="card-body">
            <form action="{{route('admin.user.edit', ['user'=>$user])}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly value="{{$user->id}}">
                </div>
                @error('name')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                @error('email')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group mt-1">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </div>
                {{--                <div class="form-group mt-1">--}}
                {{--                    <label>Password</label>--}}
                {{--                    <input class="form-control" type="password" name="password" value="{{$user->password}}">--}}
                {{--                </div>--}}
                <button type="submit"
                        class="btn btn-primary btn-block w-100 mt-3">Save
                </button>
                <a href="{{route('admin.user.index')}}" class="btn btn-danger btn-block w-100 mt-3">Cancel</a>
            </form>
        </div>
    </div>

@endsection
