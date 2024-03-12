@extends('layouts.default')

@section('title', 'Create category')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Add category</h5>

        <div class="card-body">
            <form action="{{ route('category.create') }}" method="POST">
                @csrf
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name" type="text" name="name">
                </div>
                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3">Submit</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="{{route('category.index')}}">Cancel</a>
        </div>
    </div>
@endsection
