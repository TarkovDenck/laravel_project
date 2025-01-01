@extends('admin.adminpage')

@section('title', 'Create Product')

@section('header', 'Create New Product')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
