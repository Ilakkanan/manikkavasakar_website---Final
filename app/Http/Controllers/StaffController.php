<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    


    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email_address' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'usertype' => 'required',
            'name_title' => 'required|string',
            'full_name' => 'required|string',
            'permanent_address' => 'required|string',
            'nic_no' => 'required|string',
            'phone_number' => 'required|string',
            'work_type' => 'required|string',
            'position' => 'required|string',
            'profile' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'grade' => 'nullable|string',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email_address,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);

        // Create staff
        $staff = Staff::create([
            'user_id' => $user->id,
            'name_title' => $request->name_title,
            'full_name' => $request->full_name,
            'permanent_address' => $request->permanent_address,
            'nic_no' => $request->nic_no,
            'phone_number' => $request->phone_number,
            'work_type' => $request->work_type,
            'position' => $request->position,
            'profile' => $request->file('profile') ? $request->file('profile')->store('profiles','public') : null,
            'grade' => $request->grade,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    public function index()
{
    $staffMembers = Staff::with('user')->get();
    $grades = Staff::distinct()->pluck('grade');
    $positions = Staff::distinct()->pluck('position');
    
    return view('staff.index', compact('staffMembers', 'grades', 'positions'));
}

   

    public function show($id)
{
    $staff = Staff::with('user')->findOrFail($id);
    return view('staff.show', compact('staff'));
}

public function edit($id)
{
    $staff = Staff::with('user')->findOrFail($id);
    return view('staff.edit', compact('staff'));
}

public function update(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'email_address' => 'required|email',
        'password' => 'nullable|min:6',
        'usertype' => 'required',
        'name_title' => 'required|string',
        'full_name' => 'required|string',
        'permanent_address' => 'required|string',
        'nic_no' => 'required|string',
        'phone_number' => 'required|string',
        'work_type' => 'required|string',
        'position' => 'required|string',
        'profile' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        'grade' => 'nullable|string',
    ]);

    $staff = Staff::findOrFail($id);

    // Update user data
    $user = $staff->user;
    $user->email = $request->email_address;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->usertype = $request->usertype;
    $user->save();

    // Update staff data
    $staff->name_title = $request->name_title;
    $staff->full_name = $request->full_name;
    $staff->permanent_address = $request->permanent_address;
    $staff->nic_no = $request->nic_no;
    $staff->phone_number = $request->phone_number;
    $staff->work_type = $request->work_type;
    $staff->position = $request->position;

    if ($request->hasFile('profile')) {
        // Store new profile image
        $staff->profile = $request->file('profile')->store('profiles','public');
    }

    $staff->grade = $request->grade;
    $staff->save();

    return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
}

public function destroy(Staff $staff)
{
    // First, delete the user associated with the staff
    $user = $staff->user; // Get the associated user
    $staff->delete(); // Delete the staff record
    $user->delete(); // Delete the associated user record

    return redirect()->route('staff.index')->with('success', 'Staff and associated user deleted successfully');
}

}
