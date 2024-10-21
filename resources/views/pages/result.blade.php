@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
           

            <div class="col-md-8">
                <h1 class="text-center mb-4">Quiz Results</h1>
                <h3 class="text-center text-{{ $score >=  5 ? 'success' : 'danger' }}">Status: {{ $score >=  5 ? 'Passed' : 'Failed' }}</h3>
                <h4 class="text-center ">You scored {{ $score }} out of {{ count($results) }}</h4>
                <h4 class="text-center ">Percentage: {{ $percentage }}%</h4>

                <ul class="list-group">
                    @foreach($results as $result)
                        <li class="list-group-item">
                            <h5>Question: {{ $result['question'] }}</h5>
                            <p>Your Answer: <strong>{{ $result['user_answer'] }}</strong></p>
                            <p>Correct Answer: <strong>{{ $result['correct_answer'] }}</strong></p>
                            <p class="text-{{ $result['is_correct'] ? 'success' : 'danger' }}">
                                <i class="fas fa-{{ $result['is_correct'] ? 'check-circle' : 'times-circle' }}"></i>
                                {{ $result['is_correct'] ? 'Correct' : 'Incorrect' }}
                            </p>
                        </li>
                    @endforeach
                </ul>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="btn btn-primary">Go Back to Home</a>
                </div>

               
            </div>
        </div>
    </div>
@endsection
