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
                    <div class="my-2 p-3">
                        <a href="{{ route('tech.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md ">
                            + Create Technology
                        </a>
                    </div>
                    <div class="m-2 p-3 flex flex-col w-1/2">
                        @foreach ($techs as $tech)
                            <a href="{{ route('tech.show', $tech->name) }}"
                                class="my-2 px-4 py-2 w-1/2 bg-black text-white rounded-md ">{{ $tech->name }}</a>

                            <form action="{{ route('tech.destroy', $tech->name) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this technology?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete {{ $tech->name }}
                                </button>
                            </form>
                            <hr class="my-2">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
