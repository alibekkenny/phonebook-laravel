@extends('layouts.default')

@section('title', 'Edit contact details')

@section('content')
    {{ Breadcrumbs::render('contact_details', $contact_details->contact) }}
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit contact details</h5>

        <div class="card-body">
            <form action="{{ route('contact_details.edit', ['contact_details'=> $contact_details]) }}" method="POST">
                @method('PUT')
                @csrf
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
                        class="btn btn-success btn-block w-100 mt-3">Save
                </button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="{{route('contact_details.index', ['contact'=>$contact_details->contact])}}">Cancel</a>
        </div>
    </div>
@endsection
