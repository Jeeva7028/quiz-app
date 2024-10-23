@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Add a New Question</h1>

            <!-- Add Question Form -->
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="question_text" class="form-label">Question Text</label>
                    <input type="text" class="form-control @error('question_text') is-invalid @enderror" id="question_text" name="question_text" value="{{ old('question_text') }}">
                    @error('question_text')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_1" class="form-label">Option 1</label>
                    <input type="text" class="form-control @error('option_1') is-invalid @enderror" id="option_1" name="option_1" value="{{ old('option_1') }}">
                    @error('option_1')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_2" class="form-label">Option 2</label>
                    <input type="text" class="form-control @error('option_2') is-invalid @enderror" id="option_2" name="option_2" value="{{ old('option_2') }}">
                    @error('option_2')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_3" class="form-label">Option 3</label>
                    <input type="text" class="form-control @error('option_3') is-invalid @enderror" id="option_3" name="option_3" value="{{ old('option_3') }}">
                    @error('option_3')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_4" class="form-label">Option 4</label>
                    <input type="text" class="form-control @error('option_4') is-invalid @enderror" id="option_4" name="option_4" value="{{ old('option_4') }}">
                    @error('option_4')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="correct_answer" class="form-label">Correct Answer</label>
                    <select class="form-select @error('correct_answer') is-invalid @enderror" id="correct_answer" name="correct_answer">
                        <option value="">Select the correct answer</option>
                        <option value="option_1" {{ old('correct_answer') == 'option_1' ? 'selected' : '' }}>Option 1</option>
                        <option value="option_2" {{ old('correct_answer') == 'option_2' ? 'selected' : '' }}>Option 2</option>
                        <option value="option_3" {{ old('correct_answer') == 'option_3' ? 'selected' : '' }}>Option 3</option>
                        <option value="option_4" {{ old('correct_answer') == 'option_4' ? 'selected' : '' }}>Option 4</option>
                    </select>
                    @error('correct_answer')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit Question</button>
            </form>

        </div>
    </div>
</div>

@endsection
