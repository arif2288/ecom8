@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <td class="col-1 fw-bold">SL</td>
                <td class="col-10 fw-bold">Name</td>
                <td class="col-1 text-center fw-bold">Action</td>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
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