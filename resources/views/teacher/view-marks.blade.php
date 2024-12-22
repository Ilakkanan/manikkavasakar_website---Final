@extends('layouts.dashlayout')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3>{{ __('Marks for Quiz: ') . $quiz->title }}</h3>

                @if($studentAttempts->isNotEmpty())
                    <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">Student Name</th>
                                <th class="border border-gray-300 px-4 py-2">Attempt No</th>
                                <th class="border border-gray-300 px-4 py-2">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentAttempts as $studentId => $attempts)
                                @php
                                    $student = $attempts->first()->student; // Fetch the student details
                                @endphp
                                @foreach($attempts as $attempt)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ $student->student_fullname ?? 'N/A' }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $attempt->attempt_no }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $attempt->score }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No marks available for this quiz.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
