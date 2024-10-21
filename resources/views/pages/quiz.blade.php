@extends('layouts.app')

@section('content')

 
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Welcome to Quiz</h1>
            
            <form action="{{ route('quiz') }}" method="POST">
                @csrf
                @foreach($questions as $index => $question)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Question {{ $index + 1 }}: {{ $question->question_text }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option1_{{ $question->id }}" value="{{ $question->option_1 }}">
                            <label class="form-check-label" for="option1_{{ $question->id }}">
                                {{ $question->option_1 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option2_{{ $question->id }}" value="{{ $question->option_2 }}">
                            <label class="form-check-label" for="option2_{{ $question->id }}">
                                {{ $question->option_2 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option3_{{ $question->id }}" value="{{ $question->option_3 }}">
                            <label class="form-check-label" for="option3_{{ $question->id }}">
                                {{ $question->option_3 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option4_{{ $question->id }}" value="{{ $question->option_4 }}">
                            <label class="form-check-label" for="option4_{{ $question->id }}">
                                {{ $question->option_4 }}
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Quiz</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection