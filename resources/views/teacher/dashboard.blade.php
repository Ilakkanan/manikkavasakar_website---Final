@extends('layouts.dashlayout')

@section('content')
    

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3>{{ __('Available Quizzes') }}</h3>

                        <div class="student-rank">
                            
                        </div>

                        <!-- Quiz Table -->
                        @if(count($quizzes) > 0)
                            <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Quiz Title</th>
                                        <th class="border border-gray-300 px-4 py-2">Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quizzes as $index => $quiz)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $quiz->title }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <a href="{{ route('quiz.rank', $quiz->id) }}" class="text-blue-500 underline">View Rank</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No quizzes available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
@endsection
