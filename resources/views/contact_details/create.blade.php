@extends('layouts.default')

@section('title', 'Create contact details')

@section('content')
    {{ Breadcrumbs::render('contact_details', $contact) }}
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Add contact details</h5>

        <div class="card-body">
            <form action="{{ route('contact_details.create', ['contact'=> $contact]) }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label>Category</label>
                    <select class="form-select" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                @error('value')
                <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Value</label>
                    <input class="form-control" placeholder="Value" type="text" name="value">
                </div>

                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3">Add to contact
                </button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="{{route('contact_details.index', ['contact'=>$contact])}}">Cancel</a>
        </div>
    </div>
@endsection
