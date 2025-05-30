@extends('layouts.app')

@section('title', 'Login - Aplikasi Pengajuan')

@section('content')
<h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" aria-describedby="emailHelp" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="mb-3">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p><br>
                <a href="{{ route('landing')}}">Back To Landing Page</a>
        </div>
    </form>
@endsection
