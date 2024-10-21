@extends('layouts.app')

@section('content')

    <div class="container py-5">        
        <div class="row">
            @auth
            <h1 class="text-center mb-4">Welcome to {{ auth()->user()->name }}</h1>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary btn-sm col-md-2" href="{{ route('quiz') }}" role="button">Start Quiz</a>
            </div>
            @else
            <h1 class="text-center mb-4">Welcome to Quiz App</h1>
            @endauth
        </div>
    </div>

@endsection
 