@extends('layouts.admin')

@section('title', 'Edit contact details page')

@section('content')
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Contact details edit</h5>
        <div class="card-body">
            <form action="{{route('admin.contact_details.edit', ['contact_details'=>$contact_details])}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly value="{{$contact_details->id}}">
                </div>
                <div class="form-group mt-2">
                    <label for="category_id">Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id == $contact_details->category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                @error('value')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="value">Value</label>
                    <input class="form-control" value="{{$contact_details->value}}" type="text" id="value" name="value">
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block w-100 mt-3">Save
                </button>
                <a href="{{route('admin.contact.contact_details', ['contact'=> $contact_details->contact])}}"
                   class="btn btn-danger btn-block w-100 mt-2">Cancel</a>
            </form>
        </div>
    </div>

@endsection
