<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participated Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="rankStu"></div>
                    <h3 class="text-lg font-semibold mb-4">Quizzes You Participated In (Highest Scores):</h3>

                    @if($rankedQuizzes->isEmpty())
                        <p class="text-gray-600">You haven't participated in any quizzes yet.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2">Quiz Title</th>
                                    <th class="border border-gray-300 px-4 py-2">Grade</th>
                                    <th class="border border-gray-300 px-4 py-2">Your Score</th>
                                    <th class="border border-gray-300 px-4 py-2">Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rankedQuizzes as $quiz)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $quiz->title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $quiz->grade }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $quiz->highest_score }}%</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $quiz->rank }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
