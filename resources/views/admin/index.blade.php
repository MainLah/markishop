@extends('layouts.header')
@section('content')

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <div id="create"><button><a href="{{ route('admin.create') }}">Add a product</a></button></div>
    <section id="catalog" style="padding: 1rem;">
        <div id="products">
            @foreach ($products as $product)
            <article>
                <img
                src="https://images.pexels.com/photos/5760878/pexels-photo-5760878.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="product"
                class="product-images"
                />
                <div class="card-text">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>${{ number_format($product->price, 2) }}</p>
                </div>
                <p>Availability: {{ $product->is_available ? 'Available' : 'Out of stock' }}</p>
                <div id="product-buttons">
                    <button><a href="{{ route('admin.edit', $product) }}">Edit</a></button>
                    <form action="{{ route('admin.destroy', $product) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </div>
            </article>
            @endforeach
        </div>   
    </section>
@endsection