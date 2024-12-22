<link href="{{ asset('css/common/staff.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.layout')

@section('content')
<section class="staff">
    
    <div class="container slide-up">
    <p class="title title-color">Our Staffs</p>
    <div class="box-30"></div>
        <div class="row">
            @foreach($staff as $member)
                @if ($member->position == 'Principal')
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card staff-card">
                            @if ($member->profile)
                            <img src="{{ asset('storage/' . $member->profile) }}" alt="{{ $member->full_name }}" class="card-img-top staff-img"> 
                            @else
                            <p class="card-body">No Profile</p>
                            @endif
                            
                            <div class="card-body">
                            <p class="title title-color">{{ $member->full_name }}</p>
                                <p class="card-text">{{ $member->position }}</p>
                                <a href="mailto:{{ $member->email_address }}" class="btn btn-primary">Contact</a>
                            </div>
                        </div>
                    </div>                
                @endif
            @endforeach
        </div>
        <hr>
        <div class="box-30"></div>
        <div class="row">
            @foreach($staff as $member)
                @if ($member->position == 'Vice Principal')
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card staff-card">
                            @if ($member->profile)
                            <img src="{{ asset('storage/' . $member->profile) }}" alt="{{ $member->full_name }}" class="card-img-top staff-img"> 
                            @else
                            <p class="card-body">No Profile</p>
                            @endif
                            
                            <div class="card-body">
                            <p class="title title-color">{{ $member->full_name }}</p>
                                <p class="card-text">{{ $member->position }}</p>
                                <a href="mailto:{{ $member->email_address }}" class="btn btn-primary">Contact</a>
                            </div>
                        </div>
                    </div>                
                @endif
            @endforeach
        </div>
        <hr>
        <div class="box-30"></div>
        <div class="row">
            @foreach($staff as $member)
                @if ($member->position == 'Teacher')
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card staff-card">
                            @if ($member->profile)
                            <img src="{{ asset('storage/' . $member->profile) }}" alt="{{ $member->full_name }}" class="card-img-top staff-img"> 
                            @else
                            <p class="card-body">No Profile</p>
                            @endif
                            
                            <div class="card-body">
                            <p class="title title-color">{{ $member->full_name }}</p>
                                <p class="card-text">{{ $member->position }}</p>
                                <a href="mailto:{{ $member->email_address }}" class="btn btn-primary">Contact</a>
                            </div>
                        </div>
                    </div>                
                @endif
            @endforeach
        </div>
        <hr>
        <div class="box-30"></div>
        <div class="row">
            @foreach($staff as $member)
                @if ($member->position == 'Supportive Staff')
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card staff-card">
                            @if ($member->profile)
                            <img src="{{ asset('storage/' . $member->profile) }}" alt="{{ $member->full_name }}" class="card-img-top staff-img"> 
                            @else
                            <p class="card-body">No Profile</p>
                            @endif
                            
                            <div class="card-body">
                            <p class="title title-color">{{ $member->full_name }}</p>
                                <p class="card-text">{{ $member->position }}</p>
                                <a href="mailto:{{ $member->email_address }}" class="btn btn-primary">Contact</a>
                            </div>
                        </div>
                    </div>                
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection

