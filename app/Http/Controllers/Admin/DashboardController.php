<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TutorProfile;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Fetch the statistics for the dashboard cards
        $stats = [
            'totalStudents' => User::where('role', 'student')->count(),
            'totalTutors' => User::where('role', 'tutor')->count(),
            'pendingVerifications' => TutorProfile::where('approval_status', 'pending')->count(),
            'activeSessions' => 0, 
            'monthlyEarnings' => 0,
        ];

        // --- ADDING CHART DATA ---

        // Placeholder data for the Revenue & Sessions chart
        // In a real application, you would query your 'sessions' and 'payments' tables here
        $revenueData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'revenue' => [3200, 3500, 3800, 4200, 4400, 4578],
            'sessions' => [420, 480, 520, 580, 610, 640],
        ];

        // Placeholder data for the Subject Distribution chart
        // In a real application, you would query your 'subjects' table here
        $subjectData = [
            'labels' => ['Mathematics', 'English', 'Science', 'History', 'Others'],
            'values' => [35, 25, 20, 12, 8],
        ];

        // Pass all data to the view
        return view('admin.dashboard', compact('stats', 'revenueData', 'subjectData'));
    }
}