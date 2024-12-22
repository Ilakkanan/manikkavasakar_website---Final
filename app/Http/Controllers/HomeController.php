<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            
            $user = Auth::user();
            $usertype = $user->usertype;

            if ($usertype == 'student') {
                $student = Student::where('user_id', $user->id)->first(); // Get the student data for the logged-in user
                return view('students.dashboard', compact('user', 'student'));
            } elseif ($usertype == 'teacher') {
                $staff = $user->staff;  // Get the staff record for the logged-in teacher
                $quizzes = Quiz::where('staff_id', $staff->id)->get();  // Get quizzes created by this teacher

                return view('teacher.dashboard', compact('user', 'quizzes')); // Pass quizzes to the view
            } elseif ($usertype == 'admin') {
                $users = User::where('usertype', '!=', 'superadmin')->get();
                return view('admin.dashboard', compact('user','users'));
            } elseif ($usertype == 'superadmin') {
                $users = User::all();
                return view('superAdmin.dashboard', compact('user','users'));
            } else {
                return redirect()->back();
            }
        }
    }

    // Method to view the rank of students based on the quiz score
    // Method to view the rank of students based on the quiz score
public function viewRank($quizId)
{
    // Fetch all quiz attempts for the given quiz and eager load the student relationship
    $quizAttempts = QuizAttempt::where('quiz_id', $quizId)
        ->with('student')  // Eager load the 'student' relationship
        ->orderBy('score', 'desc')  // Order by score in descending order
        ->get();

    // If there are attempts, assign ranks and map them
    $rankedStudents = $quizAttempts->map(function ($attempt, $index) {
        $attempt->rank = $index + 1;  // Assign rank based on the position in the sorted list
        return $attempt;
    });

    // Return the view with the ranked students
    return view('teacher.rank', compact('rankedStudents'));
}

    
}
