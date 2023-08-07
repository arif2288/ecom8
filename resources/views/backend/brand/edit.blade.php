@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            
        @endif
        <form action="{{ url('/brand/update/'.$brand->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="fs-4">Name</label>
                <input type="text" name="name" value="{{ $brand->name }}" class="form-control" placeholder="Enter category name"/>
            </div>
            <button type="submit" class="fs-6 mt-2 btn btn-sm btn-dark">Submit</button>
            <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("brand/manage") }}'>Manage Brand</button>
        </form>
    </div>
</div>
@endsection