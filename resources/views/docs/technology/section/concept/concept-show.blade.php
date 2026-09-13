<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$concept->title" />
    </x-slot>


    <x-dashboard-container>

        {{-- Section article --}}

        <x-slot name="div">
            <x-dashboard-head :text="$concept->title" />
            <x-dashboard-paragraph :text="$concept->description" />

        </x-slot>
    </x-dashboard-container>

</x-app-layout>
