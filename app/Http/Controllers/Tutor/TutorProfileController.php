    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|min:20',
            'qualifications' => 'required|string|min:10',
            'experience_details' => 'required|string|min:20',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Use the relationship to update or create the profile
        $user->tutorProfile()->updateOrCreate(
            ['user_id' => $user->id], // Conditions to find the profile
            [ // Data to update or create with
                'bio' => $request->bio,
                'qualifications' => $request->qualifications,
                'experience_details' => $request->experience_details,
                'approval_status' => 'pending',
            ]
        );

        // Handle file upload separately after ensuring the profile exists
        if ($request->hasFile('cv_path')) {
            $profile = $user->tutorProfile; // Get the fresh profile instance
            if ($profile->cv_path) {
                Storage::delete($profile->cv_path);
            }
            $path = $request->file('cv_path')->store('public/tutor-cvs');
            // Use a direct update for the file path
            $profile->update(['cv_path' => $path]);
        }

        // Sync the tutor's subjects with the pivot table
        $user->subjects()->sync($request->subjects);

        return redirect()->route('tutor.profile.edit')->with('success', 'Your profile has been saved and is pending review.');
    }