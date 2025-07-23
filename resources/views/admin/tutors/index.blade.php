<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Tutor Management</h2>
                <p class="text-gray-600 mt-2">Manage tutor profiles and verification status</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.tutors.index', ['status' => 'pending']) }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-xl text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Pending ({{ $pendingCount }})
                </a>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
         @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tutor</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Submitted</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Details</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($tutors as $tutor)
                            <tr class="hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full flex items-center justify-center mr-4 text-white font-semibold text-sm">
                                            {{ $tutor->name[0] }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">{{ $tutor->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $tutor->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $status = $tutor->tutorProfile->approval_status ?? 'Profile Not Created';
                                        $colorClasses = [
                                            'approved' => 'bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-800',
                                            'pending' => 'bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800',
                                            'rejected' => 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800',
                                            'Profile Not Created' => 'bg-gray-100 text-gray-800',
                                        ][$status];
                                    @endphp
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $colorClasses }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                    {{ $tutor->tutorProfile ? $tutor->tutorProfile->updated_at->format('d M, Y') : 'N/A' }}
                                </td>
                                 <td class="px-6 py-4">
                                    @if($tutor->tutorProfile && $tutor->tutorProfile->cv_path)
                                        <a href="{{ Storage::url($tutor->tutorProfile->cv_path) }}" target="_blank" class="text-indigo-600 hover:underline text-sm">View CV</a>
                                    @else
                                        <span class="text-gray-400 text-sm">No CV</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm space-x-2">
                                    {{-- This is the block with the action buttons --}}
                                    @if($tutor->tutorProfile && $tutor->tutorProfile->approval_status === 'pending')
                                        <form method="POST" action="{{ route('admin.tutors.updateStatus', $tutor->id) }}" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="p-2 rounded-lg bg-green-100 hover:bg-green-200 text-green-700 transition" title="Approve">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.tutors.updateStatus', $tutor->id) }}" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="p-2 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 transition" title="Reject">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400">No pending actions</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-500">No tutor applications to display.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             <div class="p-4">
                {{-- This ensures the pagination links work with the filter --}}
                {{ $tutors->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>