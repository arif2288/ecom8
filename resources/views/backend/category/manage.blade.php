@extends('backend.master')

@section('content')
@if (session()->has('success'))
<div class="alert alert-danger ">{{ session()->get('success') }}
</div>
@endif
<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr class="bg-secondary text-white  text-center">
                <td class="col-1 fw-bold">SL</td>
                <td class="col-10 fw-bold">Category Name</td>
                <td class="col-1 fw-bold">Action</td>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">
                        <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/category/delete/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("category/add") }}'>Add Category</button>
    </div>
</div>
@endsection