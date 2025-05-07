{{-- filepath: c:\laragon\www\laravel-pbi\resources\views\cart\index.blade.php --}}
@extends('layouts.template')

@section('content')

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <div id="container-cart">
        <div id="container-table">
            <h1 id="cart-title">Your Cart</h1>
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table id="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td ata-label="Product">{{ $item->product->name }}</td>
                            <td data-label="Price">${{ number_format($item->product->price, 2) }}</td>
                            <td data-label="Quantity">
                                <form action="{{ route('cart.update', $item) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="cart-quantity-input">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td data-label="Total">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td data-label="Actions">
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <div id="cart-back-button">
                <form action="{{ route('index') }}">
                    <button>Back</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('script/removeSuccessMessage.js?v=').time() }}"></script>

@endsection