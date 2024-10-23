@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Welcome to Quiz</h1>

            <div id="timer" class="text-center mb-4 text-danger font-weight-bold"></div>

            <form id="quizForm" action="{{ route('quiz') }}" method="POST">
                @csrf

                @foreach($questions as $index => $question)
                <div class="card mb-4 question-card" id="question_{{ $index }}" style="display: none;">
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

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" id="prevBtn" class="btn btn-secondary" style="display: none;" onclick="prevQuestion()">Previous</button>
                    <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextQuestion()">Next</button>
                    <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Submit Quiz</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    let currentQuestion = 0;
    let totalQuestions = {{ count($questions) }};
    let timer;
    let timePerQuestion = 30;

    function showQuestion(index) {
        document.querySelectorAll('.question-card').forEach((card, i) => {
            card.style.display = (i === index) ? 'block' : 'none';
        });
        
        document.getElementById('prevBtn').style.display = (index === 0) ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = (index === totalQuestions - 1) ? 'none' : 'inline-block';
        document.getElementById('submitBtn').style.display = (index === totalQuestions - 1) ? 'inline-block' : 'none';
        
        startTimer();
    }

    function startTimer() {
        let timeLeft = timePerQuestion;
        clearInterval(timer);
        document.getElementById('timer').textContent = `Time left: ${timeLeft} seconds`;

        timer = setInterval(() => {
            timeLeft--;
            document.getElementById('timer').textContent = `Time left: ${timeLeft} seconds`;
            if (timeLeft <= 0) {
                clearInterval(timer);
                nextQuestion();
            }
        }, 1000);
    }

    function nextQuestion() {
        if (currentQuestion < totalQuestions - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    }

    function prevQuestion() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        showQuestion(0);
    });
</script>

@endsection
