@extends('layouts.admin_template')

@section('content')

    <div id="admin-login">
        @if (session('error'))
            <div style="color: red; margin: 2rem;">
                {{ session('error') }}
            </div>
        @endif
    
        <form action="{{ route('admin-login') }}" method="POST" id="admin-login-form">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email..." required id="admin-email-input">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password..." required id="admin-password-input">
            <div>
                <button type="submit">Log In</button>
            </div>
        </form>
    </div>

@endsection