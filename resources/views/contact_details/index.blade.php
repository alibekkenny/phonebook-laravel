@extends('layouts.default')

@section('title', 'Contact Details')

@section('content')
    <h1>Contact Details page</h1>
    <div class="form-group mb-3">
        <label for="contact_name">Contact name</label>
        <input disabled class="form-control px-3 py-1 rounded border border-sm " placeholder="Name" type="text" name="contact_name"
               value="{{$contact->name}}">
    </div>


    <a class="btn btn-primary float-end"
       href="{{route('contact_details.create', ['contact'=>$contact])}}">Add new contact source</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-sm-1">Id</th>
            <th scope="col" class="col-sm-2">Value</th>
            <th scope="col" class="col-sm-2">Category</th>
            <th scope="col" class="col-sm-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact_details as $contact_detail)
            <tr>
                <th scope="row">{{$contact_detail->id}}</th>
                <td>{{$contact_detail->value}}</td>
                <td>{{$contact_detail->category->name}}</td>
                <td><a class="btn px-3 py-1 btn-success"
                       href="{{route('contact_details.edit', ['contact'=>$contact, 'contact_details'=> $contact_detail])}}">Edit</a>
                    <form class="d-inline" action="{{route('contact_details.delete',['contact_details'=> $contact_detail])}}" method="POST">
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
