@extends('layouts.admin_template')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong> Please fix the following errors:
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.update', $product->id) }}" method="POST" id="form-edit-product">
    @csrf
    @method('PUT')
    <div id="form-edit-product-inputs">
        <label for="product-name">Product Name</label>
        <input type="text" id="product-name" name="name" placeholder="Product Name..." required value="{{ $product->name }}">
        <label for="product-desc">Product Description</label>
        <input type="text" id="product-desc" name="description" placeholder="Product Description..." required value="{{ $product->description }}">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Price..." required min="0" step="0.01" value="{{ $product->price }}">
        <div>
            <input type="checkbox" name="is_available" value="1" {{ $product->is_available ? 'checked' : '' }}>
            <label for="is_available">Available to purchase</label>
        </div>
    </div>
    <div>
        <button><a href="{{ route('admin.index') }}">Back</a></button>
        <button type="submit">Update Product</button>
    </div>
</form>
@endsection