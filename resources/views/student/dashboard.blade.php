<x-student-layout>
    {{-- This section can be used for a page-specific header if needed --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <h2 class="text-2xl font-bold text-gray-800 mb-4">
        {{ __('Student Dashboard') }}
    </h2>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ __("Welcome, Student! You can manage your courses and find tutors here.") }}
        </div>
    </div>
</x-student-layout>