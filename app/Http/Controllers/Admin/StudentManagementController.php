<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentManagementController extends Controller
{
    /**
     * Display a listing of all students.
     */
    public function index()
    {
        // Fetch all users with the role 'student', order by the newest, and paginate
        $students = User::where('role', 'student')->latest()->paginate(10);

        // Pass the student data to the view
        return view('admin.students.index', compact('students'));
    }
}