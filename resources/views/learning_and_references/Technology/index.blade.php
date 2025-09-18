<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Technologies') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="my-4 p-5">
                        <a href="{{ route('tech.create') }}" class="btn-create">
                            + Create Technology
                        </a>
                    </div>

                    @foreach ($techs as $tech)
                        <div class="btn-container">
                            <a href="{{ route('tech.show', $tech->name) }}" class="btn-show">
                                {{ $tech->name }}
                            </a>

                            <form action="{{ route('tech.destroy', $tech->name) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this technology?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    X
                                </button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
