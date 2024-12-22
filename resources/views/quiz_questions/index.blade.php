<link href="{{ asset('css/quizquestion/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<p class="title title-color">Questions for {{ $quiz->title }}</p>
@if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
    <div class="box-30"></div>
    <div class="head-button">
    <div class="back-btn"><a href="{{ route('quizzes.index') }}">Back to Quizzes</a></div>
    <div class="back-btn ml-50"><a href="{{ route('quizzes.questions.create', $quiz->id) }}">Create Question</a></div>
    </div>
    <div class="box-30"></div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Option A</th>
                <th>Option B</th>
                <th>Option C</th>
                <th>Option D</th>
                <th>Correct Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->option_a }}</td>
                    <td>{{ $question->option_b }}</td>
                    <td>{{ $question->option_c }}</td>
                    <td>{{ $question->option_d }}</td>
                    <td>{{ $question->correct_answer }}</td>
                    <td class="min-wid-btn fl">
                    <a href="{{ route('quiz_questions.edit', [$quiz->id, $question->id]) }}" class="btn h-f-c">Edit</a>
                    <form action="{{ route('quiz_questions.destroy', [$quiz->id, $question->id]) }}" method="POST" onsubmit="return openConfirmModal(event)">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn">Delete</button>
</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="confirmModal" class="modal">
    <div class="modal-content">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this Question?</p>
        <button id="confirmYes" class="btn">Yes, Delete</button>
        <button id="confirmNo" class="btn">Cancel</button>
    </div>
</div>

<script type="text/javascript">
    function openConfirmModal(event) {
        event.preventDefault(); // Prevent form submission
        const modal = document.getElementById('confirmModal');
        modal.style.display = 'block'; // Show the modal

        const confirmYes = document.getElementById('confirmYes');
        const confirmNo = document.getElementById('confirmNo');

        // When user clicks 'Yes, Delete'
        confirmYes.onclick = function() {
            modal.style.display = 'none';
            event.target.submit(); // Submit the form
        }

        // When user clicks 'Cancel'
        confirmNo.onclick = function() {
            modal.style.display = 'none'; // Close the modal
        }

        // Close the modal if user clicks outside of the modal content
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    }
</script>
@endsection
<style>
    .alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}
</style>