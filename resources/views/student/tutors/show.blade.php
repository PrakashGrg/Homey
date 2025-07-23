<x-student-layout>
    <div x-data="{ messageModalOpen: false }">
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left Column (Tutor Info) -->
                <div class="md:col-span-1 flex flex-col items-center text-center">
                    <div class="w-32 h-32 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-5xl font-bold mb-4">
                        {{ $tutor->name[0] }}
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $tutor->name }}</h2>
                    <p class="text-md text-indigo-600 font-semibold">{{ $tutor->tutorProfile->qualifications }}</p>

                    <!-- Subject Tags -->
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        @forelse($tutor->subjects as $subject)
                            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1.5 rounded-full">
                                {{ $subject->name }}
                            </span>
                        @empty
                            <p class="text-sm text-gray-500">This tutor has not specified any subjects yet.</p>
                        @endforelse
                    </div>

                    <div class="mt-6 w-full">
                        <button class="w-full bg-green-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-600 transition-colors text-lg">
                            Book a Trial Session
                        </button>
                        {{-- This button now opens the modal --}}
                        <button @click="messageModalOpen = true" class="mt-2 w-full bg-gray-200 text-gray-800 font-bold py-3 px-6 rounded-lg hover:bg-gray-300 transition-colors">
                            Send a Message
                        </button>
                    </div>
                </div>

                <!-- Right Column (Details) -->
                <div class="md:col-span-2">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 border-b-2 border-indigo-200 pb-2 mb-4">About Me</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $tutor->tutorProfile->bio }}
                        </p>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 border-b-2 border-indigo-200 pb-2 mb-4">Experience</h3>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                            {{ $tutor->tutorProfile->experience_details }}
                        </p>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 border-b-2 border-indigo-200 pb-2 mb-4">Reviews & Ratings</h3>
                        <div class="bg-gray-50 p-6 rounded-lg text-center">
                            <p class="text-gray-600">Review and rating system will be implemented here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Modal -->
        <div x-show="messageModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
            <div @click.away="messageModalOpen = false" class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-lg mx-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Send a message to {{ $tutor->name }}</h3>
                
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $tutor->id }}">

                    <div>
                        <label for="content" class="sr-only">Message</label>
                        <textarea name="content" id="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Type your message here..." required minlength="1"></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="button" @click="messageModalOpen = false" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-student-layout>