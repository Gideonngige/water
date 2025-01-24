@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/messages.css') }}">
@if(isset($messages))
    @foreach ($messages as $message)
    <div class="message">
    <h4>{{ $message->sent_at }}</h4>
    <p>{{ $message->message_text }}</p>
    <p><i class="message-type">{{ $message->message_type }}</i></p>
    </div>
    @endforeach
@else
    <p>No messages found.</p>
@endif
@stop