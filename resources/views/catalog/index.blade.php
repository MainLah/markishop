@extends('layouts.template')

@section('content')
<main style="min-height: 100vh;">
    <button type="button" onclick="window.location.href='{{ route('index') }}'">Back</button>
    <section id="catalog">
        <h1 style="margin-bottom: 1rem;">Catalog</h1>
        <div id="products">
          @foreach ($products as $product)
            @if ($product->is_available) 
              <article data-product-id="{{ $product->id }}">
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
                <div class="quantity-control">
                  <button class="quantity-button quantity-minus">-</button>
                  <input type="number" class="quantity-input" value="1" min="1">
                  <button class="quantity-button quantity-plus">+</button>
                  <button class="main-button confirm-button">Add to Cart</button>
                </div>
              </article>
            @else
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
                <button class="main-button add-to-cart" disabled>Out of stock</button>
              </article>
            @endif
          @endforeach
        </div>
        <div id="catalog-navigation">
            {{ $products->links($paginationView) }}
        </div>
    </section>
</main>
@endsection