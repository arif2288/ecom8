@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ url('/product/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="fs-4">Category Name</label>
                <select class="form-control" name="category_id">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Subcategory Name</label>
                <select class="form-control" name="sub_category_id">
                    <option selected disabled>Select a category</option>
                    @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $product->sub_category_id == $subcategory->id ? 'selected' : ''}}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Brand Name</label>
                <select class="form-control" name="brand_id">
                    <option selected disabled>Select a brand</option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter Subcategory name"/>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter product price"/>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Discount Price</label>
                <input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control" placeholder="Enter product discount price"/>
            </div>
            <div class="form-group">
                <label for="" class="fs-4">Qty</label>
                <input type="number" name="qty" value="{{ $product->qty }}" class="form-control" placeholder="Enter product qty"/>
            </div>
            <div class="form-group">
                <label  class="fs-4">Short Description</label>
                <textarea class="form-control" rows="8" name="short_description"  placeholder="Enter short description">{{ $product->short_description }}</textarea>
            </div>
            <div class="form-group">
                <label  class="fs-4">Long Description</label>
                <textarea class="form-control" name="long_description"  id="summernote"  placeholder="Enter long description">{{ $product->long_description }}</textarea>
            </div>
            <div class="form-group">
                <label class="fs-4">Image</label>
                <input type="file" name="image" value="{{ $product->image }}" class="form-control" alt="Product image"/>
                <img src="{{ asset('product/'.$product->image) }}" height="50" width="50"/>
            </div>
            <button type="submit" class="fs-6 mt-2 btn btn-sm btn-dark">Submit</button>
            <button type="button" class="fs-6 mt-2 btn btn-sm btn-success" onclick=window.location='{{ url("product/manage") }}'>Manage Prodact</button>
        </form>
    </div>
</div>

<!-- include summernote css/js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>


@endsection