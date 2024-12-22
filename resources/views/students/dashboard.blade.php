<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __("Welcome, {$student->student_fullname}!") }}</h3>

                    <div class="row">
                        <div class="col-30">
                        @if ($student->student_image)
                        
                        <img src="{{ asset('storage/' . $student->student_image) }}" alt="Student Image" style="max-width: 300px; max-height: 300px;">
                    @endif
                        </div>
                        <div class="col-70-2">
                            <div class="row-r">
                                <div class="col-30">
                                <p><strong>Index Number:</strong> </p>
                    <p><strong>Permanent Address:</strong></p>
                    <p><strong>Residential Address:</strong> </p>
                    <p><strong>Date of Birth:</strong> </p>
                    <p><strong>GS Number:</strong></p>
                    <p><strong>GS Division:</strong> </p>
                    <p><strong>Religion:</strong> </p>
                    <p><strong>Grade:</strong> </p>
                                </div>
                                <div class="col-70">
 <p> {{ $student->index_no }}</p>
                    <p>{{ $student->permanent_address }}</p>
                    <p>{{ $student->residential_address }}</p>
                    <p> {{ $student->date_of_birth }}</p>
                    <p> {{ $student->gs_no }}</p>
                    <p> {{ $student->gs_division }}</p>
                    <p>{{ $student->religion }}</p>
                    <p> {{ $student->grade }}</p>
                    <p> {{ $student->birth_certificate_no }}</p>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- Display the student image if available -->
                   
                </div>
                <div class="row-r-2">
                <div class="quizList">
                    <a href="{{route('student.quiz.list')}}">View Quiz</a>
                </div>
                <div class="quizList ">
                        <a href="{{ route('student.quiz.ranklist') }}" >View Rank List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
    /* General Reset */


.row{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.row-r{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.row-r-2{
    width: 300px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 3rem 1rem;
}
.col-30{
    width:  30%;
}
.col-70{
   width:  65%;
}
.col-70-2{
   width:  65%;
}
/* Main Container */
.py-12 {
    padding: 3rem 1rem;
    display: flex;
    justify-content: center;
}

.w-full {
    width: 100%;
}

.bg-white {
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.p-6 {
    padding: 1.5rem;
}

/* Text Styling */
.text-gray-900 {
    color: #333;
}

h3 {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
    color: #6f0207;
}

p {
    margin: 0.5rem 0;
    line-height: 1.6;
}

/* Images */
img {
    border-radius: 5px;
    border: 2px solid #ddd;
    margin-top: 0.5rem;
    transition: transform 0.3s ease-in-out;
}

img:hover {
    transform: scale(1.1);
}

/* Links */
.quizList a {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.5rem 1rem;
    color: #fff;
    background-color: #6f0207;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-weight: bold;
}

.quizList a:hover {
    background-color: #8a0d10;
}

/* Additional Styling for Rank List Link */
.quizList.mt-4 a {
    background-color: transparent;
    color: #6f0207;
    text-decoration: underline;
}

.quizList.mt-4 a:hover {
    color: #8a0d10;
}

/* Responsive Design */
@media (max-width: 768px) {
    .py-12 {
        padding: 2rem 1rem;
    }

    h3 {
        font-size: 1.1rem;
    }

    p {
        font-size: 0.9rem;
    }

    img {
        max-width: 80px;
        max-height: 80px;
    }

    .quizList a {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
    }
}
@media (max-width: 480px) {
    .row{
        flex-direction: column;
    }
    .col-30{
    width:  49%;
}
.col-70{
   width:  49%;
}
.col-70-2{
   width:  100%;
}
}
</style>