@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<a href="{{route('announcements.index')}}"><div class="a-d-announement">Announcement</div></a>
                <br><br><br>
                <a href="{{route('staff.index')}}"><div class="a-d-announement">Staff</div></a>
                <br><br>
                <a href="{{route('students.index')}}"><div class="a-d-announement">students</div></a>
</div>
@endsection