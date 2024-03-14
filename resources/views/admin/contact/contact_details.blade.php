@extends('layouts.admin')

@section('title', 'Contact\'s details page')

@section('content')
    {{ Breadcrumbs::render('admin_contact_details', $contact) }}

    <div class="h1 fw-light">
        <span class="fst-italic">{{$contact->name}}</span> - contact details
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col">Category</th>
            <th scope="col" class="col">Value</th>
            <th scope="col" class="col-sm-4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact->contact_details as $contact_details)
            <tr>
                <th scope="row">{{$contact_details->id}}</th>
                <td>{{$contact_details->category->name}}</td>
                <td>{{$contact_details->value}}</td>
                <td>
                    <a class="btn px-3 py-1 btn-success"
                       href="{{route('admin.contact_details.edit', ['contact_details'=> $contact_details])}}">Edit</a>
                    <form class="d-inline"
                          action="{{route('admin.contact_details.delete', ['contact_details'=> $contact_details])}}"
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
