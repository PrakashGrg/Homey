<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FindTutorController extends Controller
{
    /**
     * Display a listing of approved tutors.
     */
    public function index()
    {
        // Fetch all users with the 'tutor' role
        // who have a tutorProfile with 'approval_status' set to 'approved'.
        $tutors = User::where('role', 'tutor')
            ->whereHas('tutorProfile', function ($query) {
                $query->where('approval_status', 'approved');
            })
            // Eager load both the profile AND the subjects relationship
            ->with(['tutorProfile', 'subjects']) 
            ->paginate(9);

        // Pass the approved tutors to the view
        return view('student.tutors.index', compact('tutors'));
    }

    /**
     * Display the specified tutor's profile.
     */
    public function show(User $user)
    {
        // Ensure we are only showing profiles of approved tutors
        if ($user->role !== 'tutor' || !$user->tutorProfile || $user->tutorProfile->approval_status !== 'approved') {
            // If not an approved tutor, abort with a 404 Not Found error
            abort(404);
        }

        // Pass the specific tutor's data to the view
        return view('student.tutors.show', ['tutor' => $user]);
    }
}