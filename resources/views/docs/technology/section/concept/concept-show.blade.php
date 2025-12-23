<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$concept->name" />
    </x-slot>


    <x-dashboard-container>

        {{-- Section Card --}}

        <x-slot name="div">
            <x-dashboard-head :text="$concept->name" />
            <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">
                ✎ Edit Section
            </a>
            <x-dashboard-paragraph :text="$concept->content" />
        </x-slot>
        {{-- Success update Message --}}
        <x-message :message="session('success-update-section')" color="blue" />
    </x-dashboard-container>

</x-app-layout>