@extends('layouts.admin')

@section('title', 'User\'s contact page')

@section('content')
    {{ Breadcrumbs::render('admin_contact', $user) }}

    <div class="h1 fw-light">
        <span class="fst-italic">{{$user->name}}</span> - contact list
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col">Name</th>
            <th scope="col" class="col">Description</th>
            <th scope="col" class="col-sm-4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->contacts as $contact)
            <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->description}}</td>
                <td>
                    <a class="btn px-3 py-1 btn-primary"
                       href="{{route('admin.contact.contact_details', ['contact'=> $contact])}}">Show contact
                        details</a>
                    <a class="btn px-3 py-1 btn-success"
                       href="{{route('admin.contact.edit', ['contact'=> $contact])}}">Edit</a>
                    <form class="d-inline" action="{{route('admin.contact.delete', ['contact'=> $contact])}}"
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
