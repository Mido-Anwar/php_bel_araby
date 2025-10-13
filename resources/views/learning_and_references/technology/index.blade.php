<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Technologies Overview'" />
        <x-dashboard-paragraph :text="'manage technologies '" />
    </x-slot>
    <div class="py-12">
        <x-dashboard-container>
            <div class="my-4 p-5">
                <a href="{{ route('tech.create') }}" class="btn-create">
                    + Create Technology
                </a>
            </div>

            @foreach ($technologies as $technology)
                <div class="btn-container">
                    <a href="{{ route('tech.show', $technology->name) }}" class="btn-show">
                        {{ $technology->name }}
                    </a>
                    <form action="{{ route('tech.destroy', $technology->name) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this technology?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            X
                        </button>
                    </form>
                </div>
            @endforeach
            @if (session('success-delete-technology'))
                <div class="mt-3 text-red-600">
                    {{ session('success-delete-technology') }}
                </div>
            @endif
            @if (session('success-created-technology'))
                <div class="mt-3 text-green-600">
                    {{ session('success-created-technology') }}
                </div>
            @endif
            @if (session('success-updated-technology'))
                <div class="mt-3 text-blue-600">
                    {{ session('success-updated-technology') }}
                </div>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
