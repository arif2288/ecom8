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
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("brand/add") }}'>Add Brand</button>
    </div>
</div>
@endsection