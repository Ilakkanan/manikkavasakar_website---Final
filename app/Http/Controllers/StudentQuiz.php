<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Student;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentQuiz extends Controller
{
    public function quizList()
    {
        $studentId = Auth::id(); // Ensure the user is authenticated
        $student = Auth::user()->student; // Fetch the associated student record

        if (!$student) {
            return redirect()->back()->withErrors('Student details not found.');
        }

        // Fetch quizzes matching the student's grade
        $quizzes = Quiz::where('grade', $student->grade)->get();

        // Fetch attempts grouped by quiz ID
        $attempts = QuizAttempt::where('student_id', $studentId)
            ->get()
            ->groupBy('quiz_id');

        // Pass data to the view
        return view('students.quiz.quizList', [
            'quizzes' => $quizzes,
            'attempts' => $attempts,
        ]);
    }

    public function viewRules(Quiz $quiz)
    {
        return view('students.quiz.rules', compact('quiz'));
    }

    public function participate(Quiz $quiz)
{
    $studentId = Auth::id();
    $attemptCount = QuizAttempt::where('quiz_id', $quiz->id)
        ->where('student_id', $studentId)
        ->count();

    if ($attemptCount >= $quiz->max_attempts) {
        return redirect()->route('student.quiz.list')->withErrors('You have reached the maximum number of attempts for this quiz.');
    }

    // Load teacher details
    $quiz->load('Staff');
    
    // Assuming you want to get the time related to this quiz
    $time = $quiz->time;  // Or another method to get time data
    return view('students.quiz.participate', compact('quiz', 'time'));
}



public function submit(Request $request, Quiz $quiz)
{
    $validatedData = $request->validate([
        'answers' => 'required|array',
    ]);

    $answers = $validatedData['answers'];
    $correctAnswers = 0;

    // Eager load the questions for the quiz
    $quiz->load('questions');

    // Loop through the questions and compare answers
    foreach ($quiz->questions as $question) {
        // If the answer is "X" (unanswered), treat it as wrong
        if (isset($answers[$question->id])) {
            if ($answers[$question->id] == $question->correct_answer) {
                $correctAnswers++;
            }
        } else {
            // Mark unanswered questions as wrong
            $answers[$question->id] = "X"; // Treat as incorrect
        }
    }

    // Avoid division by zero
    $totalQuestions = $quiz->questions->count();
    if ($totalQuestions == 0) {
        return redirect()->route('student.quiz.list')->withErrors('No questions available for this quiz.');
    }

    // Calculate percentage score
    $score = ($correctAnswers / $totalQuestions) * 100;
    $student = Auth::user()->student;
    
    // Create a new QuizAttempt record
    QuizAttempt::create([
        'quiz_id' => $quiz->id,
        'student_id' => Auth::id(),
        'name' => $student ? $student->student_fullname : 'N/A',
        'attempt_no' => QuizAttempt::where('quiz_id', $quiz->id)->where('student_id', Auth::id())->count() + 1,
        'score' => $score,
    ]);

    return redirect()->route('student.quiz.list')->with('success', 'Quiz submitted successfully! Your score: ' . round($score, 2) . '%');
}
public function viewRanklist()
{
    $studentId = Auth::id(); // Ensure the user is authenticated

    // Fetch highest scores for each quiz the student participated in
    $rankedQuizzes = QuizAttempt::where('student_id', $studentId)
        ->join('quizzes', 'quiz_attempts.quiz_id', '=', 'quizzes.id')
        ->select('quizzes.title', 'quizzes.grade', 'quiz_attempts.quiz_id', DB::raw('MAX(quiz_attempts.score) as highest_score'))
        ->groupBy('quiz_attempts.quiz_id', 'quizzes.title', 'quizzes.grade')
        ->get();

    // Calculate ranks for each quiz
    foreach ($rankedQuizzes as $quiz) {
        $quiz->rank = QuizAttempt::where('quiz_id', $quiz->quiz_id)
            ->where('score', '>', $quiz->highest_score)
            ->count() + 1;
    }

    // Pass the data to the view
    return view('students.quiz.ranklist', [
        'rankedQuizzes' => $rankedQuizzes,
    ]);
}


    

}
