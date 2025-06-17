@extends('layouts.app')

@section('title', 'Register - Aplikasi Pengajuan')

@section('content')
    <h2>Sign Up</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" class="form-control" aria-describedby="emailHelp" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
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
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="secret" class="form-label">Kode Akses (Opsional)</label>
            <input id="secret" type="text" name="secret" class="form-control">
            <small class="form-text text-muted">Only Fill In If You Are a Manager</small>
            @error('secret')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-custom">Register</button>
        </div>

        <div class="auth-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p><br>
            <a href="{{ route('landing')}}">Back To Landing Page</a>
        </div>
    </form>
@endsection
