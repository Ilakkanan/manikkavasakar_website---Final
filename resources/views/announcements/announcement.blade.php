<link href="{{ asset('css/announcement.css') }}" rel="stylesheet">
@extends('layouts.layout')

@section('content')
    <div class="announcement-list-2 slide-up">
        <div class="anno-1">
            <div class="anno-2">
                <h2 data-text="Announcements">Announcements</h2>
            </div>
        </div>
        <div class="box-30"></div>
        <p class="describe width-70">At J/Karaveddy Manikkavasagar Vidyalayam, we prioritize keeping our community well-informed 
            about the latest developments in our school. Whether you're a student, parent, or staff member, our 
            announcements page is your go-to source for timely updates and important information.</p>
        <div class="box-30"></div>
        <div class="box-30"></div>
        <p class="describe width-70 title-color">
    We regularly post announcements about
</p>
<ul>
    <li>School Reopening Dates: Stay updated on when school resumes after holidays or unexpected closures.</li>
    <li>Exam Schedules and Results: Get the latest information on upcoming exams, term test dates, and when results will be published.</li>
    <li>Holiday Notices: Stay informed about all school holidays, public holidays, and any special closures.</li>
    <li>Event Notifications: From annual sports events to special cultural celebrations, learn when and where they will take place.</li>
    <li>Extra-Curricular Activities: Keep an eye out for news about school clubs, competitions, and student achievements.</li>
    
</ul>

<div class="box-30"></div>
<p class="describe width-70 title-color">
    For further inquiries, please feel free to reach out via our Contact Us page.
</p>

        <div class="box-30"></div>
            <ul>
            @foreach($announcements as $announcement)
                <li>
                    <a href="{{ route('announcements.annoshow', $announcement->id) }}">
                        <p class="title title-color">{{ $announcement->title }}</p>
                        <div class="box-30"></div>
                        <p class="describe dw-0">{{ Str::limit($announcement->description, 200) }}</p> <!-- Short description -->
                    </a>
                    
                </li>
            @endforeach
        </ul>
    </div>
@endsection
