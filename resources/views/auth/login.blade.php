@extends('layouts.template')

@section('content')

    <div id="login">
        @if (session('error'))
            <div style="color: red; margin: 2rem;">
                {{ session('error') }}
            </div>
        @endif
    
        <form action="{{ route('login') }}" method="POST" id="login-form">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email..." required id="email-input">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password..." required id="password-input">
            <div>
                <button class="main-button" type="submit">Log In</button>
                <p>Don't have an account? <a href="{{ route('register') }}" style="color: #27548a;">Register here.</a></p>
            </div>
        </form>
    </div>

@endsection