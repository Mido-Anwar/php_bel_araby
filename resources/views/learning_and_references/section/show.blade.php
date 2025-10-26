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
            {{-- Success update Message --}}
            <x-message :message="session('success-update-section')" color="blue" />

            {{-- Include Concept or Built-in Function  --}}
            {{-- from component/section --}}

            <x-section.concept :section="$section" />
            <x-section.builtin-function :section="$section" />
        </x-dashboard-container>
    </div>

</x-app-layout>
