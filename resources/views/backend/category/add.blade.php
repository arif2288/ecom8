@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            
        @endif
        <form action="{{ url('/category/store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="fs-4">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter category name"/>
            </div>
            <button type="submit" class="fs-6 mt-2 btn btn-sm btn-dark">Submit</button>
            <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("category/manage") }}'>Manage Category</button>
        </form>
    </div>
</div>
@endsection