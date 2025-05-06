@extends('layouts.template')

@section('content')
    <div id="container-register">
        <div id="register">
            <div id="logo">
                <h2>Welcome to</h2>
                <h2>Markishop</h2>
            </div>
            @if ($errors->any())
                <div style="color: red; margin: 2rem;">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        
            <form action="{{ route('register') }}" method="POST" id="register-form">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your fullname..." required id="name-register-input">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email..." required id="email-register-input">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password..." required id="password-register-input">
                <div id="register-buttons">
                    <button class="main-button" type="button"><a href="{{ route('login') }}"><p style="color: #fff">Back</p></a></button>
                    <button class="main-button" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>

@endsection