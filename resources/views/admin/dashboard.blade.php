@extends('layouts.admin_template')
@section('content')
    <div id="buttons">
        <div id="logout">
            <form action="{{ route('admin-logout') }}" method="POST">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </div>
        <div id="create">
            <button><a href="{{ route('admin.create') }}">Add a product</a></button>
        </div>
    </div>

    @if (session('success'))
        <div id="success-message">
            {{ session('success') }}
        </div>
    @endif

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
                    <p>Availability: {{ $product->is_available ? 'Available' : 'Out of stock' }}</p>
                </div>
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