<link href="{{ asset('css/quizquestion/create.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<p class="title title-color" >Create Question for Quiz: {{ $quiz->title }}</p>
<div class="box-30"></div>

    <form action="{{ route('quizzes.questions.store', $quiz->id) }}" method="POST">
        @csrf
        <div>
            <label for="question">Question</label>
            <input type="text" id="question" name="question" value="{{ old('question') }}" required>
        </div>

        <div>
            <label for="option_a">Option A</label>
            <input type="text" id="option_a" name="option_a" value="{{ old('option_a') }}" required>
        </div>

        <div>
            <label for="option_b">Option B</label>
            <input type="text" id="option_b" name="option_b" value="{{ old('option_b') }}" required>
        </div>

        <div>
            <label for="option_c">Option C</label>
            <input type="text" id="option_c" name="option_c" value="{{ old('option_c') }}" required>
        </div>

        <div>
            <label for="option_d">Option D</label>
            <input type="text" id="option_d" name="option_d" value="{{ old('option_d') }}" required>
        </div>

        <div>
            <label for="correct_answer" class="title correct-answer">Correct Answer</label>
            <select id="correct_answer" name="correct_answer" required>
                <option value="A" {{ old('correct_answer') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('correct_answer') == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('correct_answer') == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('correct_answer') == 'D' ? 'selected' : '' }}>D</option>
            </select>
        </div>
        <div class="box-50"></div>
        <button type="submit" class="btn-create">Create Question</button>
    </form>
</div>
@endsection