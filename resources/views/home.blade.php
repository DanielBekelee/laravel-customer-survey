@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 text-center">
        <h1 class="mb-4">Customer Satisfaction Survey</h1>
        <p class="lead">Collect valuable feedback from your customers</p>
        
        @auth
            <a href="{{ route('surveys.index') }}" class="btn btn-primary btn-lg">My Surveys</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
        @endauth
    </div>
</div>
@endsection