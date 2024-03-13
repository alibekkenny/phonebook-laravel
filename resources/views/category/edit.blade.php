@extends('layouts.default')

@section('title', 'Edit category')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit category</h5>
        <div class="card-body">
            <form action="{{route('category.edit', ['category'=>$category])}}" method="POST">
                @method('PUT')
                @csrf
                @error('name')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Category name</label>
                    <input class="form-control" placeholder="Name" type="text" name="name"
                           value="{{$category->name}}">
                </div>
                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3">Save
                </button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="{{route('category.index')}}">Cancel</a>
        </div>
    </div>
@endsection
