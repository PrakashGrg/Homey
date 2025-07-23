<div class="divide-y divide-gray-200">
    @forelse ($conversations as $message)
        @php
            // Determine the other person in the conversation
            $otherUser = $message->sender_id == Auth::id() ? $message->receiver : $message->sender;
        @endphp
        <a href="#" class="block p-4 hover:bg-gray-50 transition-colors">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4 flex-shrink-0">
                    {{ $otherUser->name[0] }}
                </div>
                <div class="flex-grow">
                    <div class="flex justify-between items-center">
                        <h4 class="font-semibold text-gray-800">{{ $otherUser->name }}</h4>
                        <span class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-600 line-clamp-1">
                        {{-- Show if you sent the message --}}
                        @if($message->sender_id == Auth::id())
                            <span class="font-semibold">You:</span>
                        @endif
                        {{ $message->content }}
                    </p>
                </div>
            </div>
        </a>
    @empty
        <div class="p-6 text-center text-gray-500">
            You have no messages yet.
        </div>
    @endforelse
</div>