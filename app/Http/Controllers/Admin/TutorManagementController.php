<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TutorProfile;

class TutorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method now handles filtering by status.
     */
    public function index(Request $request)
    {
        // Start building the query for users with the 'tutor' role
        $query = User::where('role', 'tutor')->with('tutorProfile');

        // Check if a status filter is present in the URL (e.g., /admin/tutors?status=pending)
        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'rejected'])) {
            // Add a condition to the query to filter by the approval_status on the related tutorProfile
            $query->whereHas('tutorProfile', function ($q) use ($request) {
                $q->where('approval_status', $request->status);
            });
        }
        
        // Finalize the query, order by the latest, and paginate the results
        $tutors = $query->latest()->paginate(10);

        // Get the count of tutors with a 'pending' profile status for the button badge
        $pendingCount = TutorProfile::where('approval_status', 'pending')->count();

        // Return the view and pass the tutors and the pending count to it
        return view('admin.tutors.index', compact('tutors', 'pendingCount'));
    }

    /**
     * Update the approval status of a tutor's profile.
     * This is the new method that handles the form submissions from the approve/reject buttons.
     */
    public function updateStatus(Request $request, User $user)
    {
        // Validate that the status sent from the form is either 'approved' or 'rejected'
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Double-check that the user we are updating is actually a tutor and has a profile to update
        if ($user->role === 'tutor' && $user->tutorProfile) {
            
            // Update the approval_status field on the tutor's profile
            $user->tutorProfile->update([
                'approval_status' => $request->status
            ]);
            
            // Optional: You can send an email notification to the tutor here in the future
            // Mail::to($user->email)->send(new YourTutorApplicationUpdated($request->status));

            // Redirect back to the tutor list with a success message
            return redirect()->route('admin.tutors.index')->with('success', "Tutor application has been successfully {$request->status}.");
        }

        // If something goes wrong (e.g., user is not a tutor), redirect back with an error
        return redirect()->route('admin.tutors.index')->with('error', 'Could not update tutor status. The user may not be a tutor or has no profile.');
    }
}