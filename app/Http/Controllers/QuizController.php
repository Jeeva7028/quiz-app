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

}