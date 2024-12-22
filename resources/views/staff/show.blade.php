
<link href="{{ asset('css/staff/show.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
<p class="title title-color">Staff Details</p>
                    <div class="staff-details">
                        <div class="row first-row">
                            <div class="column profile">
                                @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile Image" width="150" height="150">
                                @else
                                    <p>No Profile Image Available</p>
                                @endif
                            </div><br>
                            <div class="column info">
                                <p class="describe title-color">{{ $staff->name_title }} {{ $staff->full_name }}</p>
                                <p>{{ $staff->user->email }}</p>
                            </div>
                        </div>
                        <div class="row second-row">
                            <div class="column field-names">
                                <p>NIC:</p>
                                <p>Phone Number:</p>
                                <p>Work Type:</p>
                                <p>Position:</p>
                                <p>Grade:</p>
                                <p>Permanent Address:</p>
                            </div>
                            <div class="column field-data">
                                <p>{{ $staff->nic_no }}</p>
                                <p>{{ $staff->phone_number }}</p>
                                <p>{{ $staff->work_type }}</p>
                                <p>{{ $staff->position }}</p>
                                <p>{{ $staff->grade ?? 'N/A' }}</p>
                                <p>{{ $staff->permanent_address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <a class="btn" href="{{ route('staff.index') }}">Back to Staff List</a>
                        <a class="btn" href="{{ route('staff.edit', $staff->id) }}">Edit Staff</a>
                    </div>
</div>
@endsection
