<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Technologies Overview'" />
    </x-slot>

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Technologies'" />

            <a href="{{ route('technology.create') }}" class="btn-create">
                + Create Technology
            </a>
            <x-dashboard-paragraph :text="'Manage the list of technologies used in learning and reference materials.'" />
        </x-slot>

        @foreach ($technologies as $technology)
            <div class="btn-container">
                <a href="{{ route('technology.show', $technology->name) }}" class="btn-show">
                    {{ $technology->id . ' :' . $technology->name }}
                </a>
                @if (Auth::user()->hasRole('super-admin'))
                    <x-delete-form :action-url="route('technology.destroy', $technology->id)" />
                @else
                @endif

            </div>
        @endforeach

        <x-message :message="session('success-store-technology')" :color="'green'" />
        <x-message :message="session('success-update-technology')" :color="'blue'" />
        <x-message :message="session('success-delete-technology')" :color="'red'" />
    </x-dashboard-container>

</x-app-layout>
