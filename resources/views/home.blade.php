<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to Marketplace Katering</h1>
    <p>Your solution for catering services for offices.</p>
    <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
@endsection
