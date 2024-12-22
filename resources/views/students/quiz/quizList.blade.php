<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz List') }}
        </h2>
    </x-slot>

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
<!-- Search and Filter Section -->
                    <h3>{{ __('Available Quizzes') }}</h3>
                    <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">Title</th>
                                <th class="border border-gray-300 px-4 py-2">Attempts</th>
                                <th class="border border-gray-300 px-4 py-2">Attempt Marks</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $quiz->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ isset($attempts[$quiz->id]) ? $attempts[$quiz->id]->count() : 0 }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if (isset($attempts[$quiz->id]) && $attempts[$quiz->id]->isNotEmpty())
                                            @foreach ($attempts[$quiz->id] as $attempt)
                                                Attempt {{ $attempt->attempt_no }}: {{ round($attempt->score, 2) }}%<br>
                                            @endforeach
                                        @else
                                            No attempts yet
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('student.quiz-rules', $quiz->id) }}" class="text-green-500 ">View Rules</a>
                                        @if (!isset($attempts[$quiz->id]) || $attempts[$quiz->id]->count() < $quiz->max_attempts)
                                            | <a href="{{ route('student.quiz-participate', $quiz->id) }}" class="text-red-500 ">Participate</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="quizList ">
                        <a href="{{ route('student.quiz.ranklist') }}" >View Rank List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
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
td a{
    text-decoration: none;

}
.text-green-500{
    color: green;
}
.text-red-500{
    color: red;
}
.quizList a:hover {
    background-color: #8a0d10;
}
</style>