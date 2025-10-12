<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$concept->name" />

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            {{-- Section Card --}}

            <x-dashboard-head :text="$concept->name" />

            <x-dashboard-paragraph :text="$concept->syntax" />
        </x-dashboard-container>
    </div>
</x-app-layout>
