@extends('layouts.header')

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

<form action="{{ route('admin.store') }}" method="POST" id="form-create-product">
    @csrf
        <div id="form-create-product-inputs">
            <label for="product-name">Product Name</label>
            <input type="text" id="product-name" name="name" placeholder="Product Name..." required>
            <label for="product-desc">Product Description</label>
            <input type="text" id="product-desc" name="description" placeholder="Product Description..." required>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" placeholder="Price..." required min="0" step="0.01">
            <div>
                <input type="checkbox" name="is_available" value={{ true }}>
                <label for="is_available">Available to purchase</label>
            </div>
        </div>
        <div>
            <button><a href="{{ route('admin.index') }}">Back</a></button>
            <button type="submit">Create Product</button>
        </div>
</form>
@endsection