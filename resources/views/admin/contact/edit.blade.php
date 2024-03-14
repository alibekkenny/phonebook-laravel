@extends('layouts.admin')

@section('title', 'Edit contact page')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Contact edit</h5>
        <div class="card-body">
            <form action="{{route('admin.contact.edit', ['contact'=>$contact])}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly value="{{$contact->id}}">
                </div>
                @error('name')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{$contact->name}}">
                </div>
                @error('description')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group mt-1">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="lorem ipsum dolor"
                              name="description">{{$contact->description}}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block w-100 mt-3">Save
                </button>
                <a href="{{route('admin.user.contact', ['user'=> $contact->user])}}"
                   class="btn btn-danger btn-block w-100 mt-2">Cancel</a>
            </form>
        </div>
    </div>

@endsection
