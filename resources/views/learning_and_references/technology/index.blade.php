<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Technologies Overview'" />
    </x-slot>






    <x-dashboard-container>
        <x-slot name="div">
        <x-dashboard-head :text="'Technologies'" />
            <a href="{{ route('tech.create') }}" class="btn-create">
                + Create Technology
            </a>
        </x-slot>

        @foreach ($technologies as $technology)
            <div class="btn-container">
                <a href="{{ route('tech.show', $technology->name) }}" class="btn-show">
                    {{ $technology->id . ' :' . $technology->name }}
                </a>
                @if (Auth::user()->hasRole('super-admin'))
                    <form action="{{ route('tech.destroy', $technology->name) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this technology?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            X
                        </button>
                    </form>
                @endif

            </div>
        @endforeach

        <x-message :message="session('success-store-technology')" :color="'green'" />
        <x-message :message="session('success-update-technology')" :color="'blue'" />
        <x-message :message="session('success-delete-technology')" :color="'red'" />
    </x-dashboard-container>

</x-app-layout>
