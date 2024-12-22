<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function index($quiz_id) {
        $quiz = Quiz::find($quiz_id);
        $questions = $quiz->questions; // Assuming relationship is set up
    
        return view('quiz_questions.index', compact('quiz', 'questions'));
    }

    public function create($quiz_id)
{
    $quiz = Quiz::find($quiz_id); // Get the quiz information

    return view('quiz_questions.create', compact('quiz'));
}

public function store(Request $request, $quiz_id)
{
    $request->validate([
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_answer' => 'required|in:A,B,C,D',
    ]);

    QuizQuestion::create([
        'quiz_id' => $quiz_id,
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_answer' => $request->correct_answer,
    ]);

    return redirect()->route('quizzes.questions.index', $quiz_id)->with('success', 'Question created successfully!');
}


public function edit($quiz_id, $question_id)
{
    $quiz = Quiz::find($quiz_id); // Get the quiz details
    $question = QuizQuestion::find($question_id); // Get the specific question to edit

    return view('quiz_questions.edit', compact('quiz', 'question'));
}

public function update(Request $request, $quiz_id, $question_id)
{
    $request->validate([
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_answer' => 'required|in:A,B,C,D',
    ]);

    $question = QuizQuestion::find($question_id);
    $question->update([
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_answer' => $request->correct_answer,
    ]);

    return redirect()->route('quizzes.questions.index', $quiz_id)->with('success', 'Question updated successfully!');
}

    public function destroy(QuizQuestion $quizQuestion)
    {
        $quizQuestion->delete();
        return redirect()->route('quiz_questions.index', $quizQuestion->quiz_id)->with('success', 'Question deleted successfully');
    }
}
