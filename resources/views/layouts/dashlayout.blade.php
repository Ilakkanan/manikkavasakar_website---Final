<link href="{{ asset('css/dash.css') }}" rel="stylesheet">
<x-app-layout>
    <div class="dash-layout">
        <div class="dash-row">
           

            <div class="dash-nav">
                <div class="fixed">
                @if (Auth::user() && (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin'))
                    <h2 class="nav-title">Staff</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('staff.index')}}">List of Staff</a></li>
                        <li><a href="{{ route('staff.create') }}">Create New Staff</a></li>
                    </ul>
                    <hr>
                    <h2 class="nav-title">Student</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('students.index')}}">List of Students</a></li>
                        <li><a href="{{ route('students.create') }}">Create New Students</a></li>
                    </ul>
                    <hr>
                    <h2 class="nav-title">Announcement</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('announcements.index')}}">List of Announcement</a></li>
                        <li><a href="{{ route('announcements.create') }}">Create New Announcement</a></li>
                    </ul>
                    <hr>
                    <h2 class="nav-title">Quizzes settings</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('quizzes.index')}}">List of Quizzes setting</a></li>
                        <li><a href="{{ route('quizzes.create') }}">Create New Quizzes setting</a></li>
                    </ul>
                    @endif



                    @if (Auth::user() && (Auth::user()->usertype == 'teacher'))
                   
                    <h2 class="nav-title">Student</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('students.index')}}">List of Students</a></li>
                        <li><a href="{{ route('students.create') }}">Create New Students</a></li>
                    </ul>
                    <hr>
                    <h2 class="nav-title">Announcement</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('announcements.index')}}">List of Announcement</a></li>
                        <li><a href="{{ route('announcements.create') }}">Create New Announcement</a></li>
                    </ul>
                    @if (Auth::user() && (Auth::user()->staff->position != 'Supportive Staff'))
                    <hr>
                    <h2 class="nav-title">Quizzes settings</h2>
                    <ul class="nav-list">
                        <li><a href="{{route('quizzes.index')}}">List of Quizzes setting</a></li>
                        <li><a href="{{ route('quizzes.create') }}">Create New Quizzes setting</a></li>
                    </ul>
                    @endif
                    @endif
                </div>
            </div>
           
            <div class="dash-content">
                @section('content')
                @show
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fixedDiv = document.querySelector('.fixed');
            const dashNav = document.querySelector('.dash-nav');

            // Get the offset position of the dash-nav
            const dashNavOffset = dashNav.offsetTop;

            window.addEventListener('scroll', function() {
                const scrollY = window.scrollY;

                // Check if the user has scrolled past the dash-nav
                if (scrollY > dashNavOffset) {
                    // Get the maximum scrollable height for the fixed div
                    const maxScroll = dashNav.scrollHeight - fixedDiv.offsetHeight;

                    // If the fixed div is not at the bottom, position it
                    if (scrollY < maxScroll) {
                        fixedDiv.style.position = 'fixed';
                        fixedDiv.style.top = '0';
                    } else {
                        fixedDiv.style.position = 'absolute';
                        fixedDiv.style.top = `${maxScroll}px`;
                    }
                } else {
                    fixedDiv.style.position = 'relative';
                    fixedDiv.style.top = '0';
                }
            });
        });
    </script>

</x-app-layout>