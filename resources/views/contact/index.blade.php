@extends('layouts.default')

@section('title', 'Contacts page')

@section('content')
    {{ Breadcrumbs::render('contact') }}
    <h1>Contacts</h1>
    <a class="btn btn-primary float-end"
       href="{{route('contact.create')}}">Add new contact</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col-sm-2">Name</th>
            <th scope="col" class="col-sm-2">Description</th>
            <th scope="col" class="col-sm-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->description}}</td>
                <td>
                    <a class="btn px-3 py-1 btn-primary"
                       href="{{route('contact_details.index', ['contact'=>$contact])}}">Show details</a>
                    <a class="btn px-3 py-1 btn-success"
                       href="{{route('contact.edit', ['contact'=>$contact])}}">Edit</a>
                    <form class="d-inline" action="{{route('contact.delete',['contact'=> $contact])}}" method="POST">
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
