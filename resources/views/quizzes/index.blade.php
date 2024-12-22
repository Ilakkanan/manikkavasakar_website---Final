
<link href="{{ asset('css/staff/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')

@section('content')
<div class="container">
    <p class="title title-color">Quiz List</p>
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
    {{ session('success') }}
    </div>
@endif
   

    <!-- Search bar -->
    <input type="text" id="searchQuiz" placeholder="Search by Title or Description" onkeyup="filterQuizzes()">

    <!-- Filter by grade -->
    <select id="gradeFilter" onchange="filterQuizzes()">
        <option value="">All Grades</option>
        @foreach($grades as $grade)
            <option value="{{ $grade }}">{{ $grade }}</option>
        @endforeach
    </select>

    <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Grade</th>
            <th>Max Attempts</th>
            <th>Staff</th>
            <th>Quiz Questions</th> 
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="quizTable">
        @foreach($quizzes as $quiz)
            <tr>
                <td class="quiz-title">{{ $quiz->id }}</td>
                <td class="quiz-title">{{ $quiz->title }}</td>
                <td class="quiz-description">{{ $quiz->description }}</td>
                <td class="quiz-grade">{{ $quiz->grade }}</td>
                <td>{{ $quiz->max_attempts }}</td>
                <td>{{ $quiz->staff->full_name ?? 'N/A' }}</td>
                <td class="min-wid-btn">
                <a class="btn" href="{{ route('quizzes.questions.create', $quiz->id) }}">Create</a> <!-- Create question button -->
                    <a class="btn" href="{{ route('quizzes.questions.index', $quiz->id) }}">View</a>
                </td>
                <td class="min-wid-btn">
                    <a class="btn" href="{{ route('quizzes.edit', $quiz->id) }}">Edit</a>
                    <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;" onsubmit="return openConfirmModal(event)">
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
        <p>Are you sure you want to delete this quiz and related questions?</p>
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
</div>

<script>
    // Search and filter functionality
    function filterQuizzes() {
        const searchValue = document.getElementById('searchQuiz').value.toLowerCase();
        const gradeValue = document.getElementById('gradeFilter').value;
        const rows = document.querySelectorAll('#quizTable tr');

        rows.forEach(row => {
            const title = row.querySelector('.quiz-title').textContent.toLowerCase();
            const description = row.querySelector('.quiz-description').textContent.toLowerCase();
            const grade = row.querySelector('.quiz-grade').textContent;

            const titleMatch = title.includes(searchValue) || description.includes(searchValue);
            const gradeMatch = gradeValue === "" || grade === gradeValue;

            if (titleMatch && gradeMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
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