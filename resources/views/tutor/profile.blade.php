<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tutor Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-4">Complete your profile to start connecting with students. Your profile will be reviewed by an administrator before it is visible to students.</p>

                    <form method="POST" action="{{ route('tutor.profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Bio -->
                        <div>
                            <x-input-label for="bio" :value="__('About Me (Bio)')" />
                            <textarea id="bio" name="bio" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ old('bio', $profile->bio) }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <!-- Qualifications -->
                        <div class="mt-4">
                            <x-input-label for="qualifications" :value="__('Qualifications (e.g., M.Sc. in Physics, Certified Language Instructor)')" />
                            <textarea id="qualifications" name="qualifications" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('qualifications', $profile->qualifications) }}</textarea>
                            <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                        </div>

                        <!-- Subjects Taught (NEWLY ADDED) -->
                        <div class="mt-4">
                            <x-input-label for="subjects" :value="__('Subjects You Teach')" />
                            <select id="subjects" name="subjects[]" multiple class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-48">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ in_array($subject->id, $tutorSubjectIds) ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('subjects')" class="mt-2" />
                            <p class="text-sm text-gray-500 mt-1">Hold down Ctrl (or Cmd on Mac) to select multiple subjects.</p>
                        </div>

                        <!-- Experience -->
                        <div class="mt-4">
                            <x-input-label for="experience_details" :value="__('Experience Details')" />
                            <textarea id="experience_details" name="experience_details" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ old('experience_details', $profile->experience_details) }}</textarea>
                            <x-input-error :messages="$errors->get('experience_details')" class="mt-2" />
                        </div>

                        <!-- CV Upload -->
                        <div class="mt-4">
                            <x-input-label for="cv_path" :value="__('Upload CV (PDF, DOC, DOCX - Max 2MB)')" />
                            <x-text-input id="cv_path" class="block mt-1 w-full" type="file" name="cv_path" />
                             @if ($profile->cv_path)
                                <p class="text-sm text-gray-500 mt-2">Current CV: <a href="{{ Storage::url($profile->cv_path) }}" target="_blank" class="text-indigo-600 hover:underline">View Uploaded CV</a></p>
                            @endif
                            <x-input-error :messages="$errors->get('cv_path')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Save Profile') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>