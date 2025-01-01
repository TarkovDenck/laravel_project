@extends('admin.adminpage')

@section('title', 'Edit Product')

@section('header', 'Edit Product')

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
