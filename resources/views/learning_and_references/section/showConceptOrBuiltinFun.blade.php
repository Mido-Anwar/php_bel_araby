<x-app-layout>

    <x-slot name="header">
        <h2 @if (detectLanguage($concept->name ?? $builtInFunction->name) == 'ar') dir="rtl" @endif
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($concept->name ?? $builtInFunction->name) }}
        </h2>

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            {{-- Section Card --}}
            <div class="flex justify-between items-center mb-4">
                <h2 @if (detectLanguage($concept->name ?? $builtInFunction->name) == 'ar') dir="rtl" @endif class="font-bold text-xl text-gray-800 dark:text-gray-100">
                    {{ Str::upper($concept->name ?? $builtInFunction->name) }}
                </h2>

            </div>
            <p @if (detectLanguage($concept->name ?? $builtInFunction->name) == 'ar') dir="rtl" @endif  class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                {{ $concept->syntax ?? $builtInFunction->syntax }}
            </p>
        </x-dashboard-container>
    </div>
</x-app-layout>
