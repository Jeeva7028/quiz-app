@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 bg-light text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark text-white">
                    <img src="https://t3.ftcdn.net/jpg/03/23/12/42/360_F_323124237_SfGqpttZqU2mrMm61VPSWA2tKvc95l9O.jpg" class="card-img" alt="Banner Image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            @auth
                            <h1 class="card-title mb-4">Welcome to {{ auth()->user()->name }}</h1>
                            <a class="btn btn-primary btn-lg" href="{{ route('quiz') }}" role="button">Start Quiz</a>
                            @else
                            <h1 class="card-title mb-4">Welcome to Quiz</h1>
                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
 