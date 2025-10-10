<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Technologies') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 max-w-2xl">
            This section provides a clear overview of your project’s technologies.
            You can create new technologies, view their details, and delete the ones
            you no longer need — making it simple to keep everything organized and up to date.
        </p>
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
