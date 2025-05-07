@extends('layouts.template')

@section('content')
    @if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
    @endif

<main id="profile-section" style="height: 100vh">
    <div id="profile-back-button">
        <button type="button" onclick="window.location.href = '{{ route('index') }}'">Back</button>
    </div>
    <section id="profile">
        <div id="profile-picture">
            <img src="{{ asset('assets/user-3296.svg') }}" alt="Profile Picture">
        </div>
        <div id="data-profile">
            <p>
                Name : <br>
                {{ $data[0]->name }} 
            </p>
            <p>
                Email : <br>
                {{ $data[0]->email }}
            </p>
        </div>
    </section>
    <form action="{{ route('profile.change_password') }}" method="POST" id="change-password-form">
        @csrf
        @method('PUT')
        <div class="change-password-inputs">
            <label for="old_password">Old Password</label>
            <input type="password" name="old_password">
        </div>
        <div class="change-password-inputs">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password">
        </div>
        <div id="change-password-button">
            <button type="submit">Change Password</button>
        </div>
    </form>
</main>

<script src="{{ asset('script/removeSuccessMessage.js?v=').time() }}"></script>

@endsection