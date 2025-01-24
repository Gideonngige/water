@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/home.css') }}">
<div class="home" >
    <div class="home-content">
        <h1>Welcome to Water Supply Company!</h1>
        <p>Thank you for choosing us as your water provider. We are proud to have you as part of our caravan. We are committed to providing you with the best services and ensuring that you have a constant supply of clean water. We are always here to help you with any issues you may have. Feel free to contact us at any time.</p>
        <button class="btn btn-custom">Contact us</button>
        <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
        <a href="{{ route('register') }}" class="btn btn-custom">Register</a>
        @if(isset($email))
        <p>{{ $email }}</p>
        @endif
        

    </div>
    

</div>
@stop