<link href="{{ asset('css/student/create.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<p class="title title-color">Edit Student</p>

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="index_no" class="block myColor">Index No</label>
                        <input type="text" name="index_no" id="index_no" value="{{ $student->index_no }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="student_fullname" class="block myColor">Full Name</label>
                        <input type="text" name="student_fullname" value="{{ $student->student_fullname }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="email_address" class="block myColor">Email</label>
                        <input type="email" name="email_address" id="email_address" value="{{ $student->user->email }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block myColor">Password</label>
                        <input type="password" name="password" placeholder="New Password (leave blank to keep current password)" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="permanent_address" class="block myColor">Permanent Address</label>
                        <textarea name="permanent_address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">{{ $student->permanent_address }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="residential_address" class="block myColor">Residential Address</label>
                        <textarea name="residential_address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">{{ $student->residential_address }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date_of_birth" class="block myColor">Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="gs_no" class="block myColor">GS No</label>
                        <input type="text" name="gs_no" value="{{ $student->gs_no }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="gs_division" class="block myColor">GS Division</label>
                        <input type="text" name="gs_division" value="{{ $student->gs_division }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="religion" class="block myColor">Religion</label>
                        <select name="religion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
    <option value="Hinduism" {{ old('religion', $student->religion) == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
    <option value="Christianity" {{ old('religion', $student->religion) == 'Christianity' ? 'selected' : '' }}>Christianity</option>
    <option value="Buddhism" {{ old('religion', $student->religion) == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
    <option value="Islam" {{ old('religion', $student->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
    <option value="Other" {{ old('religion', $student->religion) == 'Other' ? 'selected' : '' }}>Other</option>
</select>

                    </div>

                    <div class="mb-4">
                        <label for="grade" class="block myColor">Grade</label>
                        <select name="grade" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                                <option value="Grade 1 A" {{ old('grade', $student->grade) == 'Grade 1 A' ? 'selected' : '' }}>Grade 1 A</option>
                                <option value="Grade 1 B" {{ old('grade', $student->grade) == 'Grade 1 B' ? 'selected' : '' }}>Grade 1 B</option>
                                <option value="Grade 2 A" {{ old('grade', $student->grade) == 'Grade 2 A' ? 'selected' : '' }}>Grade 2 A</option>
                                <option value="Grade 2 B" {{ old('grade', $student->grade) == 'Grade 2 B' ? 'selected' : '' }}>Grade 2 B</option>
                                <option value="Grade 3 A" {{ old('grade', $student->grade) == 'Grade 3 A' ? 'selected' : '' }}>Grade 3 A</option>
                                <option value="Grade 3 B" {{ old('grade', $student->grade) == 'Grade 3 B' ? 'selected' : '' }}>Grade 3 B</option>
                                <option value="Grade 4 A" {{ old('grade', $student->grade) == 'Grade 4 A' ? 'selected' : '' }}>Grade 4 A</option>
                                <option value="Grade 4 B" {{ old('grade', $student->grade) == 'Grade 4 B' ? 'selected' : '' }}>Grade 4 B</option>
                                <option value="Grade 5 A" {{ old('grade', $student->grade) == 'Grade 5 A' ? 'selected' : '' }}>Grade 5 A</option>
                                <option value="Grade 5 B" {{ old('grade', $student->grade) == 'Grade 5 B' ? 'selected' : '' }}>Grade 5 B</option>
                                <option value="Passout" {{ old('grade', $student->grade) == 'Passout' ? 'selected' : '' }}>Passout</option>
                            </select>
                    </div>

                    <div class="mb-4">
                        <label for="height" class="block myColor">Height (in meters)</label>
                        <input type="number" id="height" name="height" value="{{ $student->height }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block myColor">Weight (in kg)</label>
                        <input type="number" id="weight" name="weight" value="{{ $student->weight }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="BMI" class="block myColor">BMI</label>
                        <input type="text" id="BMI" name="BMI" value="{{ $student->BMI }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="birth_certificate_no" class="block myColor">Birth Certificate No (optional)</label>
                        <input type="text" name="birth_certificate_no" value="{{ $student->birth_certificate_no }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="birth_certificate_image" class="block myColor">Birth Certificate Image</label>
                        <input type="file" name="birth_certificate_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="father_fullname" class="block myColor">Father's Full Name</label>
                        <input type="text" name="father_fullname" value="{{ $student->father_fullname }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="father_NIC" class="block myColor">Father's NIC</label>
                        <input type="text" name="father_NIC" value="{{ $student->father_NIC }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="father_phone_no" class="block myColor">Father's Phone No</label>
                        <input type="text" name="father_phone_no" value="{{ $student->father_phone_no }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="father_work" class="block myColor">Father's Work</label>
                        <input type="text" name="father_work" value="{{ $student->father_work }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="mother_fullname" class="block myColor">Mother's Full Name</label>
                        <input type="text" name="mother_fullname" value="{{ $student->mother_fullname }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="mother_NIC" class="block myColor">Mother's NIC</label>
                        <input type="text" name="mother_NIC" value="{{ $student->mother_NIC }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="mother_phone_no" class="block myColor">Mother's Phone No</label>
                        <input type="text" name="mother_phone_no" value="{{ $student->mother_phone_no }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="mother_work" class="block myColor">Mother's Work</label>
                        <input type="text" name="mother_work" value="{{ $student->mother_work }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="yearly_income_family" class="block myColor">Yearly Family Income (optional)</label>
                        <input type="text" name="yearly_income_family" value="{{ $student->yearly_income_family }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="passout_year" class="block myColor">Passout Year (optional)</label>
                        <input type="number" name="passout_year" value="{{ $student->passout_year }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="student_image" class="block myColor">Student Image (optional)</label>
                        <input type="file" name="student_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <button type="submit" class="btn-create">Update</button>
                </form>
                <script>
                    document.getElementById('index_no').addEventListener('input', function() {
                        const indexNo = this.value; // Get the current value of index_no
                        const emailField = document.getElementById('email_address'); // Get the email_address field

                        // Update the email field in real time
                        emailField.value = indexNo ? indexNo + '@jkmv.lk' : ''; // If index_no is empty, clear the email
                    });

                    function calculateBMI() {
                        const height = parseFloat(document.getElementById('height').value);
                        const weight = parseFloat(document.getElementById('weight').value);
                        const bmiField = document.getElementById('BMI');

                        if (height > 0 && weight > 0) {
                            const bmi = (weight / (height * height)).toFixed(2); // Calculate BMI
                            bmiField.value = bmi; // Update BMI input
                        } else {
                            bmiField.value = ''; // Clear the BMI field if inputs are invalid
                        }
                    }

                    // Add event listeners for height and weight inputs
                    document.getElementById('height').addEventListener('input', calculateBMI);
                    document.getElementById('weight').addEventListener('input', calculateBMI);
                </script>
</div>
@endsection
