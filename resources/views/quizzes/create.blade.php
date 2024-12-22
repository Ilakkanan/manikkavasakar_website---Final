<link href="{{ asset('css/quizzes/create.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<p class="title title-color">Create Quiz</p>
<div class="box-30"></div>
    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="staff_id" class="title-color">Staff</label>
            <select name="staff_id" required>
                <option value="">Select Staff</option>
                @foreach ($staffMembers as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title" class="title-color">Title</label>
            <input type="text" name="title" required>
        </div>
        <div class="form-group">
            <label for="description" class="title-color">Description</label>
            <textarea name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="grade" class="title-color">Grade</label>
            <select name="grade" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                <!-- Grade 1 -->
                                <option value="Grade 1 A" {{ old('grade') == 'Grade 1 A' ? 'selected' : '' }}>Grade 1 A</option>
                                <option value="Grade 1 B" {{ old('grade') == 'Grade 1 B' ? 'selected' : '' }}>Grade 1 B</option>

                                <!-- Grade 2 -->
                                <option value="Grade 2 A" {{ old('grade') == 'Grade 2 A' ? 'selected' : '' }}>Grade 2 A</option>
                                <option value="Grade 2 B" {{ old('grade') == 'Grade 2 B' ? 'selected' : '' }}>Grade 2 B</option>

                                <!-- Grade 3 -->
                                <option value="Grade 3 A" {{ old('grade') == 'Grade 3 A' ? 'selected' : '' }}>Grade 3 A</option>
                                <option value="Grade 3 B" {{ old('grade') == 'Grade 3 B' ? 'selected' : '' }}>Grade 3 B</option>

                                <!-- Grade 4 -->
                                <option value="Grade 4 A" {{ old('grade') == 'Grade 4 A' ? 'selected' : '' }}>Grade 4 A</option>
                                <option value="Grade 4 B" {{ old('grade') == 'Grade 4 B' ? 'selected' : '' }}>Grade 4 B</option>

                                <!-- Grade 5 -->
                                <option value="Grade 5 A" {{ old('grade') == 'Grade 5 A' ? 'selected' : '' }}>Grade 5 A</option>
                                <option value="Grade 5 B" {{ old('grade') == 'Grade 5 B' ? 'selected' : '' }}>Grade 5 B</option>

                            </select>
        </div>
        <div class="form-group">
            <label for="max_attempts" class="title-color">Max Attempts</label>
            <input type="number" name="max_attempts" value="3" required min="1">
        </div>
        <button type="submit" class="btn-create">Create Quiz</button>
    </form>

</div>
@endsection