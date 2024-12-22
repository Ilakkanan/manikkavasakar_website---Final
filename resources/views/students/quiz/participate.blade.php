<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participate in Quiz: ') }} {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4">Quiz Details</h3>
                    <p><strong>Title:</strong> {{ $quiz->title }}</p>
                    <p><strong>Grade:</strong> {{ $quiz->grade }}</p>
                    <p><strong>Teacher:</strong> {{ $quiz->staff->user->name }}</p>

                    <h4 class="font-bold text-lg mt-4">
                        Time Remaining: <span id="countdown">{{$time}}</span> minutes
                    </h4>

                    <form id="quiz-form" method="POST" action="{{ route('student.quiz-submit', $quiz->id) }}">
                        @csrf
                        @foreach ($quiz->questions as $index => $question)
                            <div class="mt-6">
                                <p><strong>Question {{ $index + 1 }}:</strong> {{ $question->question }}</p>
                                <div class="mt-2">
                                    <label class="block">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="A" required>
                                        {{ $question->option_a }}
                                    </label>
                                    <label class="block">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="B">
                                        {{ $question->option_b }}
                                    </label>
                                    <label class="block">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="C">
                                        {{ $question->option_c }}
                                    </label>
                                    <label class="block">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="D">
                                        {{ $question->option_d }}
                                    </label>
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded shadow hover:bg-green-600">
                                Submit Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var timeRemaining = {{$time}} * 60;  // Convert minutes to seconds
        var tenMinutesAlertShown = false;

        function updateCountdown() {
            if (timeRemaining <= 0) {
                document.getElementById('countdown').innerHTML = "Time's up!";
                alert("Time's up! The quiz will be submitted automatically.");
                document.getElementById('quiz-form').submit();
            } else {
                var minutes = Math.floor(timeRemaining / 60);
                var seconds = timeRemaining % 60;
                document.getElementById('countdown').innerHTML = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

                // Show alert when 10 minutes are left
                if (minutes === 9 && !tenMinutesAlertShown) {
                    alert("You have 10 minutes left to complete the quiz.");
                    tenMinutesAlertShown = true;
                }

                timeRemaining--;
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
    </script>
</x-app-layout>
<style>
    /* General Layout */
body {
    font-family: 'Roboto', sans-serif;
}

h2, h3, h4 {
    margin-bottom: 1rem;
    color: #1F2937; /* Dark text for headings */
}

/* Form styling */
form {
    max-width: 900px;
    margin: auto;
    padding: 1rem;
    background-color: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

input[type="radio"] {
    margin-right: 10px;
}

button {
    width: 100%;
    padding: 0.75rem;
    background-color: #10B981; /* Green button */
    color: white;
    font-weight: 600;
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #059669; /* Darker green on hover */
}

/* Countdown styling */
#countdown {
    font-size: 1.25rem;
    font-weight: bold;
    color: #D80000; /* Red for countdown */
}

/* Table styling for responsive quiz options */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

th, td {
    border: 1px solid #ddd;
    padding: 0.75rem;
    text-align: left;
    font-size: 1rem;
}

th {
    background-color: #f9fafb;
}

/* Responsiveness */
@media (max-width: 768px) {
    .p-6 {
        padding: 1rem;
    }

    form {
        padding: 1rem;
        width: 100%;
    }

    h2 {
        font-size: 1.25rem;
    }

    button {
        font-size: 0.875rem;
    }

    #countdown {
        font-size: 1.125rem;
    }
}

@media (max-width: 480px) {
    label {
        font-size: 0.875rem;
    }

    h2, h3, h4 {
        font-size: 1rem;
    }

    button {
        font-size: 0.75rem;
    }

    #countdown {
        font-size: 1rem;
    }
}

</style>