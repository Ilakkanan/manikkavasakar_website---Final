<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $gradeFilter = $request->input('grade');

    // Fetch all distinct grades
    $grades = Student::distinct()->pluck('grade');
    $usertype = Auth::user()->usertype;

    if ($usertype == 'teacher') {
        // Get the teacher's grade
        $teacherGrade = Auth::user()->staff->grade; // Assuming the `grade` field exists in the `users` table for teachers
        
        // Fetch students in the teacher's grade
        $studentsInGrade = Quiz::where('grade', $teacherGrade)->pluck('id');

        // Fetch quizzes related to those students
        $quizzes = Quiz::with('staff')
            ->whereIn('grade', [$teacherGrade]) // Ensure the quiz grade matches the teacher's grade
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($gradeFilter, function ($query) use ($gradeFilter) {
                $query->where('grade', $gradeFilter);
            })
            ->get();
    } else {
        // Fetch quizzes for other user types
        $quizzes = Quiz::with('staff')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($gradeFilter, function ($query) use ($gradeFilter) {
                $query->where('grade', $gradeFilter);
            })
            ->get();
    }

    return view('quizzes.index', compact('quizzes', 'grades'));
}

    


    public function create()
    {
        $staffMembers = Staff::all(); // Fetch staff members for dropdown
        return view('quizzes.create', compact('staffMembers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'grade' => 'required|string',
            'max_attempts' => 'required|integer|min:1',
        ]);

        Quiz::create($request->all());
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        $staffMembers = Staff::all(); // Fetch staff members for dropdown
        return view('quizzes.edit', compact('quiz', 'staffMembers'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'grade' => 'required|string',
            'max_attempts' => 'required|integer|min:1',
        ]);

        $quiz->update($request->all());
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
{
    // Delete all related questions
    $quiz->questions()->delete();

    // Now delete the quiz itself
    $quiz->delete();

    return redirect()->route('quizzes.index')->with('success', 'Quiz and related questions deleted successfully.');
}
}
