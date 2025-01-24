@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/login.css') }}">
<div class="inner-container">
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" id="email" class="form-control" name="email" placeholder="e.g john@example.com" required /><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" class="form-control" name="password" placeholder="enter your password" required /><br>
        <button type="submit" class="btn btn-custom">Login</button>
        <p>Don't have an account? <a href="">Register here</a></p>
    </form>
    @if(isset($message))
    <p class="alert alert-danger">{{ $message }}</p>
    @endif
</div>
@stop