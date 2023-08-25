@extends('backend.master')

@section('content')

@if (session()->has('success'))
<div class="alert alert-danger ">{{ session()->get('success') }}
</div>
@endif
<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr  class="bg-secondary text-white  text-center">
                <td class="col-1 fw-bold">SL</td>
                <td class="col-2 fw-bold">Category Name</td>
                <td class="col-2 fw-bold">Brand Name</td>
                <td class="col-2 fw-bold">Product Name</td>
                <td class="col-1 fw-bold">Product Price</td>
                <td class="col-1 fw-bold">Discount Price</td>
                <td class="col-1 fw-bold">Quantity</td>
                <td class="col-1 fw-bold">Image</td>
                <td class="col-1 fw-bold">Action</td>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td class="col-1 text-center">{{ $loop->index+1 }}</td>
                    <td class="col-1 text-center">{{ $product->category?->name }}</td>
                    <td class="col-1 text-center">{{ $product->brand?->name }}</td>
                    <td class="col-1 text-center">{{ $product->name }}</td>
                    <td class="col-1 text-center">{{ $product->price }}</td>
                    <td class="col-1 text-center">{{ $product->discount_price }}</td>
                    <td class="col-1 text-center">{{ $product->qty }}</td>
                    <td class="col-1 text-center">
                        <img src="{{ asset('product/'.$product->image) }}" height="50" width="50" />
                    </td>
                    <td class="col-1 text-center">
                        <a href="{{ url('/product/edit/'.$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/product/delete/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("product/add") }}'>Add Product</button>
    </div>
</div>
@endsection