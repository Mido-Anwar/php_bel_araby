<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$concept->name" />
    </x-slot>


    <x-dashboard-container>

        {{-- Section article --}}

        <x-slot name="div">
            <x-dashboard-head :text="$concept->name" />
            <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">
                ✎ Edit Section
            </a>
            <x-dashboard-paragraph :text="$concept->syntax" />
            <x-dashboard-paragraph :text="$concept->description" />
            <x-dashboard-paragraph :text="$concept->example" />
            
        </x-slot>
    </x-dashboard-container>

</x-app-layout>