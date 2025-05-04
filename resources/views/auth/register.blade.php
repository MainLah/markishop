@extends('layouts.template')

@section('content')

    <div id="register">
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
                <button class="main-button"><a href="{{ route('login') }}">Back</a></button>
                <button class="main-button" type="submit">Register</button>
            </div>
        </form>
    </div>

@endsection