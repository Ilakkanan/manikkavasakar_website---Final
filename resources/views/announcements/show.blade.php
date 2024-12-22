<link href="{{ asset('css/announcement.css') }}" rel="stylesheet">
@extends('layouts.layout')

@section('content')
    <div class="announcement-detail-2 slide-up">
    <div class="anno-1">
            <div class="anno-2">
                <h2 data-text="Announcements">Announcements</h2>
            </div>
        </div>
        <div class="width-70">
        <div class="box-50"></div>
        <h1 class="title title-color">{{ $announcement->title }}</h1>
        <p class="describe">{{ $announcement->description }}</p>
        <div class="box-50"></div>
        <a href="{{ route('announcements.annoindex') }}">Back to List</a></div>
    </div>
@endsection
