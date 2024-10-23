<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuizController extends Controller{
    
    public function index(){
        $questions = Questions::all()->shuffle();
        return view('pages.quiz', compact('questions'));
    }

    public function showQuiz()
    {
        $questions = Questions::inRandomOrder()->limit(10)->get();

        return view('quiz', compact('questions'));
    }

    public function submitQuiz(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
        ]);

        $answers = $validated['answers'];
        $user = Auth::user();
        Answer::where('user_id', $user->id)->delete();
        $results = [];

        foreach ($answers as $questionId => $userAnswer) {
            $question = Questions::find($questionId);

            if ($question) {
                Answer::create([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question->correct_answer,
                ]);

                $results[] = [
                    'question' => $question->question_text,
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question->correct_answer,
                    'is_correct' => $userAnswer === $question->correct_answer,
                ];
            }
        }
        $correctAnswers = count(array_filter($results, function ($result) {
            return $result['is_correct'];
        }));
        $passPercentage = ($correctAnswers / count($results)) * 100;

        return view('pages.result', [
            'results' => $results,
            'score' => $correctAnswers,
            'percentage' => $passPercentage,
        ]);
    }

    public function storeQuestion(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'question_text' => 'required|string|max:255',
        'option_1' => 'required|string|max:255',
        'option_2' => 'required|string|max:255',
        'option_3' => 'required|string|max:255',
        'option_4' => 'required|string|max:255',
        'correct_answer' => 'required|in:option_1,option_2,option_3,option_4',
    ]);

    // Create a new question in the database
    Questions::create([
        'question_text' => $validated['question_text'],
        'option_1' => $validated['option_1'],
        'option_2' => $validated['option_2'],
        'option_3' => $validated['option_3'],
        'option_4' => $validated['option_4'],
        'correct_answer' => $validated['correct_answer'],
    ]);

    // Redirect with success message
    return redirect()->route('questions.add')->with('success', 'Question added successfully!');
}

public function showAddQuestionForm()
{
    return view('pages.add-question');
}


}