<link href="{{ asset('css/announcement/create.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<p class="title title-color">Edit Announcement</p>
            <div class="box-30"></div>
    <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="title-color">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $announcement->title }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="title-color">Description:</label>
            <textarea class="form-control" name="description">{{ $announcement->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
@endsection
















