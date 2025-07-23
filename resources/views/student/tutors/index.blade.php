<x-student-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Find Your Perfect Tutor</h2>
            <p class="mt-1 text-gray-600">Browse our list of expert tutors who are ready to help you succeed.</p>
        </div>

        {{-- Tutors Grid --}}
        @if($tutors->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tutors as $tutor)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        <div class="p-6 flex-grow">
                            <div class="flex items-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-4 flex-shrink-0">
                                    {{ $tutor->name[0] }}
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $tutor->name }}</h3>
                                    <p class="text-sm text-indigo-600 font-medium line-clamp-1">{{ $tutor->tutorProfile->qualifications }}</p>
                                </div>
                            </div>

                            <!-- Subject Tags -->
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($tutor->subjects->take(3) as $subject) {{-- Show up to 3 subjects --}}
                                    <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        {{ $subject->name }}
                                    </span>
                                @endforeach
                                @if($tutor->subjects->count() > 3)
                                    <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        +{{ $tutor->subjects->count() - 3 }} more
                                    </span>
                                @endif
                            </div>

                            <p class="text-gray-600 text-sm my-4 line-clamp-3">
                                {{ $tutor->tutorProfile->bio }}
                            </p>
                        </div>
                        <div class="p-6 pt-0">
                             <a href="{{ route('student.tutors.show', $tutor) }}" class="w-full inline-block text-center bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
                                View Profile & Book
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination Links --}}
            <div class="mt-8">
                {{ $tutors->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-10 text-center">
                <p class="text-gray-600">There are currently no approved tutors available. Please check back later.</p>
            </div>
        @endif
    </div>
</x-student-layout>