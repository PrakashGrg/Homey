<x-admin-layout>
    <div class="space-y-8">
        {{-- Page Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Dashboard Overview</h2>
                <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your platform today.</p>
            </div>
        </div>

        {{-- Define SVG icons once --}}
        @php
            $usersIcon = '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.084-1.284-.24-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.084-1.284.24-1.857m11.52 1.857A3 3 0 0014 18a3 3 0 00-5.04 0m9.04-6a3 3 0 11-6 0 3 3 0 016 0zm-6 0a3 3 0 10-6 0 3 3 0 006 0z"></path></svg>';
            $tutorsIcon = '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-9.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-9.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222 4 2.222V20M1 12l11 6 11-6M1 12v6a1 1 0 001 1h22a1 1 0 001-1v-6"></path></svg>';
            $pendingIcon = '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
            $sessionsIcon = '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
            $earningsIcon = '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1m0-1V4m0 2.01v-2.01m-3.34-2.34c-.39.34-.73.73-.99 1.17m-2.42 2.42c-.44.44-.83.94-1.17 1.5m-1.17 3.34c-.34.39-.63.83-.83 1.33m1.17 2.42c.34.39.73.73 1.17.99m2.42 2.42c.44.44.94.83 1.5 1.17m3.34 1.17c.39.34.83.63 1.33.83m2.42-1.17c.39-.34.73-.73.99-1.17m2.42-2.42c.44-.44.83-.94 1.17-1.5m1.17-3.34c.34-.39.63-.83-.83-1.33m-1.17-2.42c-.34-.39-.73-.73-1.17-.99m-2.42-2.42c-.44-.44-.94-.83-1.5-1.17M8.66 4.66c-.39-.34-.83-.63-1.33-.83"></path></svg>';
        @endphp

        {{-- Stats Grid using the new component --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <x-stat-card title="Total Students" :value="$stats['totalStudents']" :icon="$usersIcon" color="from-blue-500 to-cyan-600" />
            <x-stat-card title="Total Tutors" :value="$stats['totalTutors']" :icon="$tutorsIcon" color="from-emerald-500 to-teal-600" />
            <x-stat-card title="Pending Verifications" :value="$stats['pendingVerifications']" :icon="$pendingIcon" color="from-amber-500 to-orange-600" />
            <x-stat-card title="Active Sessions" :value="$stats['activeSessions']" :icon="$sessionsIcon" color="from-purple-500 to-indigo-600" />
            <x-stat-card title="Monthly Earnings" :value="'$'.$stats['monthlyEarnings']" :icon="$earningsIcon" color="from-green-500 to-emerald-600" />
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-8">
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Revenue & Sessions Trend</h3>
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Subject Distribution</h3>
                <div class="mx-auto" style="max-width: 350px;">
                    <canvas id="subjectChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data passed from the controller
            const revenueData = @json($revenueData);
            const subjectData = @json($subjectData);

            // Revenue Chart... (rest of the script is the same)
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, { /* ... */ });
            const subjectCtx = document.getElementById('subjectChart').getContext('2d');
            new Chart(subjectCtx, { /* ... */ });
        </script>
    @endpush
</x-admin-layout>