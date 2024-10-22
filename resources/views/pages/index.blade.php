@extends('layouts.app')

@section('content')

    <div class="container-expand-lg bg-light text-dark">
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

    <div class="container-fluid bg-light py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-header">What is Quiz?</div>
                    <div class="card-body">
                        <h5 class="card-title">Quiz is a game</h5>
                        <p class="card-text">Quiz is a game where you have to answer questions in a limited time. The questions are randomly generated and the answers are multiple choice. The game is designed to be fun and challenging.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-header">How to Play</div>
                    <div class="card-body">
                        <h5 class="card-title">Playing is easy</h5>
                        <p class="card-text">To play, just click on the "Start Quiz" button. You will be presented with a question and four possible answers. Choose the answer you think is correct and click on the "Submit" button. You will then be given the next question. The game continues until you have answered all the questions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-header">Rules</div>
                    <div class="card-body">
                        <h5 class="card-title">Rules are simple</h5>
                        <p class="card-text">The game has a few simple rules. You can only answer one question at a time. You cannot go back to a previous question. You cannot skip a question. You must answer all the questions to finish the game.</p>
                    </div>
                </div>
                    </div>
                </div>
            </div>
       

@endsection
 