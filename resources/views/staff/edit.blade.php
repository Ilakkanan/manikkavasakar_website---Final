<link href="{{ asset('css/staff.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')
<div class="full-height">
                    <p class="title title-color">Edit Staff</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" name="email_address" class="form-control" value="{{ old('email_address', $staff->user->email) }}" required>
                            @error('email_address')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password (Leave blank if not changing)</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- User Type -->
                        <div class="form-group">
                            <label for="usertype">User Type</label>
                            <select name="usertype" class="form-control" required>
                                <option value="admin" {{ old('usertype', $staff->user->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="teacher" {{ old('usertype', $staff->user->usertype) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            </select>
                            @error('usertype')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name Title -->
                        <div class="form-group">
                            <label for="name_title">Name Title</label>
                            <select name="name_title" class="form-control" required>
                                <option value="mr" {{ old('name_title', $staff->name_title) == 'mr' ? 'selected' : '' }}>Mr</option>
                                <option value="miss" {{ old('name_title', $staff->name_title) == 'miss' ? 'selected' : '' }}>Miss</option>
                                <option value="mrs" {{ old('name_title', $staff->name_title) == 'mrs' ? 'selected' : '' }}>Mrs</option>
                                <option value="other" {{ old('name_title', $staff->name_title) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('name_title')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $staff->full_name) }}" required>
                            @error('full_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Permanent Address -->
                        <div class="form-group">
                            <label for="permanent_address">Permanent Address</label>
                            <input type="text" name="permanent_address" class="form-control" value="{{ old('permanent_address', $staff->permanent_address) }}" required>
                            @error('permanent_address')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- NIC No -->
                        <div class="form-group">
                            <label for="nic_no">NIC No</label>
                            <input type="text" name="nic_no" class="form-control" value="{{ old('nic_no', $staff->nic_no) }}" required>
                            @error('nic_no')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $staff->phone_number) }}" required>
                            @error('phone_number')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Work Type -->
                        <div class="form-group">
                            <label for="work_type">Work Type</label>
                            <select name="work_type" class="form-control" required>
                                <option value="academicstaff" {{ old('work_type', $staff->work_type) == 'academicstaff' ? 'selected' : '' }}>Academic Staff</option>
                                <option value="non-academicstaff" {{ old('work_type', $staff->work_type) == 'non-academicstaff' ? 'selected' : '' }}>Non-Academic Staff</option>
                            </select>
                            @error('work_type')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Position -->
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select name="position" class="form-control" required>
                                <option value="Principal" {{ old('position', $staff->position) == 'Principal' ? 'selected' : '' }}>Principal</option>
                                <option value="Vice Principal" {{ old('position', $staff->position) == 'Vice Principal' ? 'selected' : '' }}>Vice Principal</option>
                                <option value="Teacher" {{ old('position', $staff->position) == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                <option value="Supportive Staff" {{ old('position', $staff->position) == 'Supportive Staff' ? 'selected' : '' }}>Supportive Staff</option>
                            </select>
                            @error('position')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="form-group">
                            <label for="profile">Profile Image (optional)</label>
                            <input type="file" name="profile" class="form-control-file" accept="image/*">
                            @if ($staff->profile)
                                <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile Image" width="100" class="mt-2">
                            @endif
                            @error('profile')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Grade (Optional) -->
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <select name="grade" class="form-control" required>
                                <option value="Grade 1 A" {{ old('grade', $staff->grade) == 'Grade 1 A' ? 'selected' : '' }}>Grade 1 A</option>
                                <option value="Grade 1 B" {{ old('grade', $staff->grade) == 'Grade 1 B' ? 'selected' : '' }}>Grade 1 B</option>
                                <option value="Grade 2 A" {{ old('grade', $staff->grade) == 'Grade 2 A' ? 'selected' : '' }}>Grade 2 A</option>
                                <option value="Grade 2 B" {{ old('grade', $staff->grade) == 'Grade 2 B' ? 'selected' : '' }}>Grade 2 B</option>
                                <option value="Grade 3 A" {{ old('grade', $staff->grade) == 'Grade 3 A' ? 'selected' : '' }}>Grade 3 A</option>
                                <option value="Grade 3 B" {{ old('grade', $staff->grade) == 'Grade 3 B' ? 'selected' : '' }}>Grade 3 B</option>
                                <option value="Grade 4 A" {{ old('grade', $staff->grade) == 'Grade 4 A' ? 'selected' : '' }}>Grade 4 A</option>
                                <option value="Grade 4 B" {{ old('grade', $staff->grade) == 'Grade 4 B' ? 'selected' : '' }}>Grade 4 B</option>
                                <option value="Grade 5 A" {{ old('grade', $staff->grade) == 'Grade 5 A' ? 'selected' : '' }}>Grade 5 A</option>
                                <option value="Grade 5 B" {{ old('grade', $staff->grade) == 'Grade 5 B' ? 'selected' : '' }}>Grade 5 B</option>
                                <option value="Other" {{ old('grade', $staff->grade) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('grade')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Staff</button>
                    </form>
                
</div>
@endsection