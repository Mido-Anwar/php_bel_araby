@php
    $colorClasses = match($color ?? 'green') {
        'green', 'emerald' => 'bg-emerald-50 dark:bg-emerald-950/50 border-emerald-200 dark:border-emerald-800/60 text-emerald-700 dark:text-emerald-300',
        'blue' => 'bg-blue-50 dark:bg-blue-950/50 border-blue-200 dark:border-blue-800/60 text-blue-700 dark:text-blue-300',
        'red' => 'bg-red-50 dark:bg-red-950/50 border-red-200 dark:border-red-800/60 text-red-700 dark:text-red-300',
        'amber' => 'bg-amber-50 dark:bg-amber-950/50 border-amber-200 dark:border-amber-800/60 text-amber-700 dark:text-amber-300',
        'black' => 'bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300',
        
        default => 'bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300',
    };
@endphp

@if ($message)
    <div class="mt-4 p-4 rounded-2xl border shadow-sm flex items-center gap-3 text-sm md:text-base font-semibold transition-all duration-200 {{ $colorClasses }}">
        <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span>{{ $message }}</span>
    </div>
@endif
