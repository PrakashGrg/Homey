<div class="group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <p class="text-gray-600 text-sm font-medium mb-1">{{ $title }}</p>
            <p class="text-3xl font-bold text-gray-900 mb-2">{{ $value }}</p>
        </div>
        <div class="p-4 rounded-2xl bg-gradient-to-br {{ $color }} shadow-lg">
            {!! $icon !!}
        </div>
    </div>
</div>