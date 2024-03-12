@extends('layouts.default')

@section('title', 'Edit contact')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit contact</h5>
        <div class="card-body">
            <form action="{{route('contact.edit', ['contact'=>$contact])}}" method="POST">
                @method('PUT')
                @csrf
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Contact name</label>
                    <input class="form-control" placeholder="Name" type="text" name="name"
                           value="{{$contact->name}}">
                </div>

                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group mt-1">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Lorem ipsum dolor..." rows="3" type="text"
                              name="description">{{$contact->description}}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3">Save</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="{{route('contact.index')}}">Cancel</a>
        </div>
    </div>
@endsection
