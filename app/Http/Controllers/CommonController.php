<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Staff;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index()
{
    // Fetch the last 5 announcements
    $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();

    return view('index', compact('announcements'));
}
public function anno_index()
    {
        $announcements = Announcement::all(); // Fetch all announcements
        return view('announcements.announcement', compact('announcements'));
    }

    // Show single announcement by ID
    public function anno_show($id)
    {
        $announcement = Announcement::findOrFail($id); // Fetch the announcement by ID
        return view('announcements.show', compact('announcement'));
    }
    public function contact()
    {
         return view('common.contact');
    }
    public function about()
    {
         return view('common.about');
    }
    public function display()
    {
        $staff = Staff::all(); // Assuming you have a Staff model
        return view('common.staff', compact('staff'));
    }
    
}
