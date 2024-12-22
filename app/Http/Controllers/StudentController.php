<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
{
    // Define the number of records per page
    $perPage = 10; // Change this value as needed

    // Get search and filter values from request
    $search = $request->input('search');
    $gs_division = $request->input('gs_division');
    $religion = $request->input('religion');
    $passout_year = $request->input('passout_year');
    $grade = $request->input('grade');
    $currentPage = $request->input('page', 1); // Default to page 1 if no page is specified

    // Query students with filtering
    $query = Student::with('user');

    if ($search) {
        $query->where('student_fullname', 'LIKE', '%' . $search . '%');
    }
    
    if ($gs_division) {
        $query->where('gs_division', $gs_division);
    }

    if ($religion) {
        $query->where('religion', $religion);
    }

    if ($passout_year) {
        $query->where('passout_year', $passout_year);
    }

    if ($grade) {
        $query->where('grade', $grade);
    }

    // Get total count and paginated results
    $totalStudents = $query->count();
    $students = $query->offset(($currentPage - 1) * $perPage)
                      ->limit($perPage)
                      ->get();

    // Calculate total number of pages
    $totalPages = ceil($totalStudents / $perPage);

    
    $grades = Student::distinct()->pluck('grade');
    $passout_year = Student::distinct()->pluck('passout_year');
    $gsdivisions = Student::distinct()->pluck('gs_division');
    $religions = Student::distinct()->pluck('religion');

    return view('students.index', compact('students', 'totalPages', 'currentPage','grades','passout_year','gsdivisions','religions'));
}



    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'index_no' => 'required|string|unique:students',
            'student_fullname' => 'required|string',
            'email_address' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'permanent_address' => 'required|string',
            'residential_address' => 'required|string',
            'date_of_birth' => 'required|date',
            'gs_no' => 'required|string',
            'gs_division' => 'required|string',
            'religion' => 'required|string',
            'grade' => 'required|string',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'BMI' => 'nullable|numeric',
            'birth_certificate_no' => 'nullable|string',
            'birth_certificate_image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'father_fullname' => 'required|string',
            'father_NIC' => 'required|string',
            'father_phone_no' => 'required|string',
            'father_work' => 'required|string',
            'mother_fullname' => 'required|string',
            'mother_NIC' => 'required|string',
            'mother_phone_no' => 'required|string',
            'mother_work' => 'required|string',
            'yearly_income_family' => 'nullable|numeric',
            'passout_year' => 'nullable|integer',
            'student_image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'usertype' => 'required|string',
        ]);

        // Create user record
        $user = User::create([
            'name' => $request->student_fullname,
            'email' => $request->email_address,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        // Create student record
        $student = Student::create([
            'user_id' => $user->id,
            'index_no' => $request->index_no,
            'student_fullname' => $request->student_fullname,
            'permanent_address' => $request->permanent_address,
            'residential_address' => $request->residential_address,
            'date_of_birth' => $request->date_of_birth,
            'gs_no' => $request->gs_no,
            'gs_division' => $request->gs_division,
            'religion' => $request->religion,
            'grade' => $request->grade,
            'height' => $request->height,
            'weight' => $request->weight,
            'BMI' => $request->BMI,
            'birth_certificate_no' => $request->birth_certificate_no,
            'birth_certificate_image' => $request->file('birth_certificate_image') ? $request->file('birth_certificate_image')->store('birth_certificates') : null,
            'father_fullname' => $request->father_fullname,
            'father_NIC' => $request->father_NIC,
            'father_phone_no' => $request->father_phone_no,
            'father_work' => $request->father_work,
            'mother_fullname' => $request->mother_fullname,
            'mother_NIC' => $request->mother_NIC,
            'mother_phone_no' => $request->mother_phone_no,
            'mother_work' => $request->mother_work,
            'yearly_income_family' => $request->yearly_income_family,
            'passout_year' => $request->passout_year,
            'student_image' => $request->file('student_image') ? $request->file('student_image')->store('students') : null,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validate incoming request
        $request->validate([
            'email_address' => 'required|email|unique:users,email,' . $student->user->id,
            'student_fullname' => 'required|string',
            'permanent_address' => 'required|string',
            'residential_address' => 'required|string',
            'date_of_birth' => 'required|date',
            'gs_no' => 'required|string',
            'gs_division' => 'required|string',
            'religion' => 'required|string',
            'grade' => 'required|string',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'BMI' => 'nullable|numeric',
            'birth_certificate_no' => 'nullable|string',
            'birth_certificate_image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'father_fullname' => 'required|string',
            'father_NIC' => 'required|string',
            'father_phone_no' => 'required|string',
            'father_work' => 'required|string',
            'mother_fullname' => 'required|string',
            'mother_NIC' => 'required|string',
            'mother_phone_no' => 'required|string',
            'mother_work' => 'required|string',
            'yearly_income_family' => 'nullable|numeric',
            'passout_year' => 'nullable|integer',
            'student_image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update user record
        $student->user->name = $request->student_fullname;
        $student->user->email = $request->email_address;
        $student->user->save();

        // Update student record
        $student->update([
            'index_no' => $request->index_no,
            'student_fullname' => $request->student_fullname,
            'permanent_address' => $request->permanent_address,
            'residential_address' => $request->residential_address,
            'date_of_birth' => $request->date_of_birth,
            'gs_no' => $request->gs_no,
            'gs_division' => $request->gs_division,
            'religion' => $request->religion,
            'grade' => $request->grade,
            'height' => $request->height,
            'weight' => $request->weight,
            'BMI' => $request->BMI,
            'birth_certificate_no' => $request->birth_certificate_no,
            'birth_certificate_image' => $request->file('birth_certificate_image') ? $request->file('birth_certificate_image')->store('birth_certificates') : $student->birth_certificate_image,
            'father_fullname' => $request->father_fullname,
            'father_NIC' => $request->father_NIC,
            'father_phone_no' => $request->father_phone_no,
            'father_work' => $request->father_work,
            'mother_fullname' => $request->mother_fullname,
            'mother_NIC' => $request->mother_NIC,
            'mother_phone_no' => $request->mother_phone_no,
            'mother_work' => $request->mother_work,
            'yearly_income_family' => $request->yearly_income_family,
            'passout_year' => $request->passout_year,
            'student_image' => $request->file('student_image') ? $request->file('student_image')->store('students') : $student->student_image,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function show(Student $student)
{
    return view('students.show', compact('student'));
}

    public function destroy(Student $student)
    {
        // First, delete the user associated with the student
        $user = $student->user; // Get the associated user
        $student->delete(); // Delete the student record
        $user->delete(); // Delete the associated user record

        return redirect()->route('students.index')->with('success', 'Student and associated user deleted successfully.');
    }
}
