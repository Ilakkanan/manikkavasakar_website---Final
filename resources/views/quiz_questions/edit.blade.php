<link href="{{ asset('css/quizquestion/create.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">


@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<p class="title title-color">Edit Question for Quiz: {{ $quiz->title }}</p>
<div class="box-30"></div>

<form action="{{ route('quiz_questions.update', [$quiz->id, $question->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="question">Question</label>
        <input type="text" id="question" name="question" value="{{ $question->question }}" required>
    </div>

    <div>
        <label for="option_a">Option A</label>
        <input type="text" id="option_a" name="option_a" value="{{ $question->option_a }}" required>
    </div>

    <div>
        <label for="option_b">Option B</label>
        <input type="text" id="option_b" name="option_b" value="{{ $question->option_b }}" required>
    </div>

    <div>
        <label for="option_c">Option C</label>
        <input type="text" id="option_c" name="option_c" value="{{ $question->option_c }}" required>
    </div>

    <div>
        <label for="option_d">Option D</label>
        <input type="text" id="option_d" name="option_d" value="{{ $question->option_d }}" required>
    </div>

    <div>
        <label for="correct_answer" class="title correct-answer">Correct Answer</label>
        <select id="correct_answer" name="correct_answer" required>
            <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>A</option>
            <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>B</option>
            <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>C</option>
            <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>D</option>
        </select>
    </div>
    <div class="box-50"></div>
    <button type="submit" class="btn-create">Update Question</button>
</form>
</div>
@endsection