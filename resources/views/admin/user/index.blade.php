@extends('layouts.admin')

@section('title', 'Users page')

@section('content')
    {{ Breadcrumbs::render('admin_user') }}
    
    <div class="h1">Users list</div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col">Name</th>
            <th scope="col" class="col">Email</th>
            <th scope="col" class="col-sm-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn px-3 py-1 btn-primary"
                       href="{{route('admin.user.contact', ['user'=> $user])}}">Show contacts</a>
                    <a class="btn px-3 py-1 btn-success"
                       href="{{route('admin.user.edit', ['user'=> $user])}}">Edit</a>
                    <form class="d-inline" action="{{route('admin.user.delete', ['user'=> $user])}}"
                          method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn px-3 py-1 btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
