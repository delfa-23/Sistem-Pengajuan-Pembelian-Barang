@extends('layouts.apps')
@section('title', 'Home Page')
@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="name" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form>
@endsection

<x-button>NADIF</x-button>
<x-layout>HI </x-layout>
