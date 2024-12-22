@extends('layouts.dashlayout')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __('Student Rankings for Quiz: ') . $rankedStudents->first()->quiz->title }}</h3>

                    <!-- Rank Table -->
                    @if(count($rankedStudents) > 0)
                        @foreach($rankedStudents->groupBy('attempt_no') as $attemptNo => $studentsByAttempt)
                            <h4 class="mt-4">Attempt No: {{ $attemptNo }}</h4>
                            
                            @php
                                // Sort students by score in descending order and calculate rank
                                $studentsByAttempt = $studentsByAttempt->sortByDesc('score');
                                $rank = 1;

                                // Fetch all student names in advance to avoid repeated DB queries in the loop
                                $studentNames = DB::table('students')->whereIn('id', $studentsByAttempt->pluck('student_id'))->pluck('student_fullname', 'id');
                            @endphp

                            <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">Rank</th>
                                        <th class="border border-gray-300 px-4 py-2">Student Name</th>
                                        <th class="border border-gray-300 px-4 py-2">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($studentsByAttempt as $rankedStudent)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $rank }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                @if($rankedStudent->student_id)
                                                    {{ $rankedStudent->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $rankedStudent->score }}</td>
                                        </tr>
                                        @php
                                            $rank++; // Increment the rank for each student
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @else
                        <p>No attempts available for this quiz.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
