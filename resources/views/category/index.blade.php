@extends('layouts.default')

@section('title', 'Categories page')

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-primary float-end"
       href="{{route('category.create')}}">Add new category</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col-sm-2">Name</th>
            <th scope="col" class="col-sm-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><a class="btn px-3 py-1 btn-success"
                       href="{{route('category.edit', ['category'=>$category])}}">Edit</a>
                    <form class="d-inline" action="{{route('category.delete',['category'=> $category])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn px-3 py-1 btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
