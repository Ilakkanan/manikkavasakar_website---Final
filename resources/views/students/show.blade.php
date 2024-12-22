<link href="{{ asset('css/student/show.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')

@section('content')
    <p class="title title-color">Student Details</p>
    <div class="box-30"></div>

    <div class="row-m">
        <div class="col-30-st">
            @if($student->student_image)
                <img src="{{ asset('storage/' . $student->student_image) }}" alt="Student Image" class="mt-2" style="max-width: 200px;">
            @else
                <p>No image available.</p>
            @endif
        </div>
        <div class="col-70-st">
            <p class="title title-color">{{ $student->student_fullname }}</p>
            <p>Grade: {{ $student->grade }}</p>
            <p>Index no: {{ $student->index_no }}</p>
            <p>Email Address: {{ $student->user->email }}</p>
        </div>
    </div>

    <div class="box-30"></div>

    <div class="row-m">
        <div class="col-50">
            <div class="mb-4">
                <label class="describe title-color">Residential Address</label>
                <p class="sub-color">{{ $student->residential_address }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">GS Division</label>
                <p class="sub-color">{{ $student->gs_division }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Date of Birth</label>
                <p class="sub-color">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Father's Full Name</label>
                <p class="sub-color">{{ $student->father_fullname }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Father's NIC</label>
                <p class="sub-color">{{ $student->father_NIC }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Father's Phone No</label>
                <p class="sub-color">{{ $student->father_phone_no }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Father's Work</label>
                <p class="sub-color">{{ $student->father_work }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Height (in meters)</label>
                <p class="sub-color">{{ $student->height }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Weight (in kg)</label>
                <p class="sub-color">{{ $student->weight }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">BMI</label>
                <p class="sub-color">{{ $student->BMI }}</p>
            </div>
        </div>

        <div class="col-50">
            <div class="mb-4">
                <label class="describe title-color">Permanent Address</label>
                <p class="sub-color">{{ $student->permanent_address }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">GS No</label>
                <p class="sub-color">{{ $student->gs_no }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Religion</label>
                <p class="sub-color">{{ $student->religion }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Mother's Full Name</label>
                <p class="sub-color">{{ $student->mother_fullname }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Mother's NIC</label>
                <p class="sub-color">{{ $student->mother_NIC }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Mother's Phone No</label>
                <p class="sub-color">{{ $student->mother_phone_no }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Mother's Work</label>
                <p class="sub-color">{{ $student->mother_work }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Birth Certificate No</label>
                <p class="sub-color">{{ $student->birth_certificate_no }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Yearly Income</label>
                <p class="sub-color">{{ $student->yearly_income_family }}</p>
            </div>
            <div class="mb-4">
                <label class="describe title-color">Passout Year</label>
                <p class="sub-color">{{ $student->passout_year }}</p>
            </div>
        </div>
    </div>

    <div class="box-30"></div>

    <div class="row-m">
        <div class="col-30-st">
            @if($student->birth_certificate_image)
                <img src="{{ asset('storage/' . $student->birth_certificate_image) }}" alt="Birth Certificate Image" class="mt-2" style="max-width: 200px;">
            @else
                <p>No image available.</p>
            @endif
        </div>
        <div class="col-70-st">
            <p class="title title-color">Birth Certificate Image</p>
        </div>
    </div>

    <div class="box-30"></div>

    <a href="{{ route('students.index') }}">
        <button class="btn-create">Back to Students List</button>
    </a>
@endsection
