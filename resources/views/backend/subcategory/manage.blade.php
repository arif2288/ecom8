@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <td class="col-1 fw-bold">SL</td>
                <td class="col-5 fw-bold">Category Name</td>
                <td class="col-5 fw-bold">Sub Category Name</td>
                <td class="col-1 text-center fw-bold">Action</td>
            </tr>
            @foreach ($subcategories as $subcategory)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $subcategory->category?->name }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>
                        <a href="{{ url('/subcategory/edit/'.$subcategory->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/subcategory/delete/'.$subcategory->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("subcategory/add") }}'>Add Category</button>
    </div>
</div>
@endsection