<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$section->title" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>

            {{-- Section Card --}}

         <x-slot name="div">
                <x-dashboard-head :text="$section->title" />
                <a href="{{ route('section.edit', $section->id) }}" class="btn-edit">
                    ✎ Edit Section
                </a>


            <x-dashboard-paragraph :text="$section->content" />
            </x-slot>
            {{-- Success update Message --}}
            <x-message :message="session('success-update-section')" color="blue" />
        </x-dashboard-container>
        <x-dashboard-container>
            {{-- Include Concept or Built-in Function  --}}
            {{-- from component/section --}}

            <x-section.concept :section="$section" />
            <x-message :message="session('success-update-concept')" :color="'blue'" />
            <x-message :message="session('success-delete-concept')" :color="'red'" />
            <x-section.builtin-function :section="$section" />
            <x-message :message="session('success-update-builtinFunction')" :color="'blue'" />
            <x-message :message="session('success-delete-builtinFunction')" :color="'red'" />
        </x-dashboard-container>
    </div>

</x-app-layout>
