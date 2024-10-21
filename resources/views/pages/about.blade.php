@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="row">
            <h1 class="text-center mb-4">About Our Quiz Application</h1>
        </div><br>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-light mb-3">
                    <div class="card-header">What is this application about?</div>
                    <div class="card-body">
                        <p class="card-text">
                            Our quiz application is designed to test your knowledge on a wide range of topics, including PHP, web development, general knowledge, and more. With this platform, you can challenge yourself, track your progress, and improve your skills. 
                        </p>
                        <p class="card-text">
                            Each quiz features carefully crafted questions with multiple choice answers. After submitting your answers, you'll receive immediate feedback, showing both your submitted answers and the correct ones, so you can learn from your mistakes and improve.
                        </p>
                        <p class="card-text">
                            Whether you're preparing for a test, enhancing your professional skills, or just looking for some fun, our quiz platform is here to make learning engaging and interactive.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <br>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center mb-4">Why Use Our Quiz App?</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-light">✔ Wide range of topics, including programming, general knowledge, and more.</li>
                    <li class="list-group-item list-group-item-light">✔ Real-time results with correct answers provided for learning.</li>
                    <li class="list-group-item list-group-item-light">✔ User-friendly interface for smooth navigation and a great experience.</li>
                    <li class="list-group-item list-group-item-light">✔ Track your progress and improve over time.</li>
                    <li class="list-group-item list-group-item-light">✔ Completely free to use with new quizzes added regularly.</li>
                </ul>
            </div>
        </div>
    </div>

@endsection

