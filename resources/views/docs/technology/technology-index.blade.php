<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Technologies Overview'" />
    </x-slot>

    <x-dashboard-container>

        @if ($technologies->isEmpty())
            <x-slot name="div">
                <x-dashboard-head :text="'No technologies available.'" />
                <a href="{{ route('technology.create') }}" class="btn-create">
                    + Create Technology
                </a>
            </x-slot>
        @else
            <x-slot name="div">
                <x-dashboard-head :text="'List of Technologies'" />
                <a href="{{ route('technology.create') }}" class="btn-create">
                    + Create Technology
                </a>
            </x-slot>
            @foreach ($technologies as $technology)
                <div class="small-container">
                    <a href="{{ route('technology.show', $technology->id) }}" class="btn-show">
                        {{ $technology->name }}
                    </a>
                    @if (Auth::user()->hasRole('super-admin'))
                        <x-delete-form :action-url="route('technology.destroy', $technology->id)" />
                    @else
                    @endif

                </div>
            @endforeach
        @endif
        <x-message :message="session('success-store-technology')" :color="'green'" />
        <x-message :message="session('success-update-technology')" :color="'blue'" />
        <x-message :message="session('success-delete-technology')" :color="'red'" />
    </x-dashboard-container>

</x-app-layout>
