<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$section->title" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>

            {{-- Section Card --}}

            <div class="flex justify-between items-center mb-4">
                <x-dashboard-head :text="$section->title" />
                <a href="{{ route('section.edit', $section->id) }}" class="btn-edit">
                    ✎ Edit Section
                </a>
            </div>

            <x-dashboard-paragraph :text="$section->content" />
            {{-- Success Message --}}
            @if (session('success_section-update'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success_section-update') }}
                </div>
            @endif

            {{-- Include Concept or Built-in Function  --}}
            {{-- from component/section --}}

            <x-section.concept :section="$section" />
            <x-section.builtin-function :section="$section" />
        </x-dashboard-container>
    </div>

</x-app-layout>
