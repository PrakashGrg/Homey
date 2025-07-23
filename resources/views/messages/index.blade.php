{{-- This page can be used by both students and tutors, so we check the role to extend the correct layout --}}
@if(Auth::user()->role === 'student')
    <x-student-layout>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">My Inbox</h2>
        <div class="bg-white rounded-lg shadow-md">
            @include('messages.partials.conversation-list')
        </div>
    </x-student-layout>
@elseif(Auth::user()->role === 'tutor')
    <x-app-layout> {{-- Assuming the tutor uses the default app layout for now --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Inbox') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-md">
                    @include('messages.partials.conversation-list')
                </div>
            </div>
        </div>
    </x-app-layout>
@endif