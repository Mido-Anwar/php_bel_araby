@props(['actionUrl', 'open' => false, 'fields' => [], 'btnName' => 'Open Form'])
<div class="inline-block border p-3 w-full" x-data="{ open: @json($open) }">
    {{-- Toggle button --}}
    <button type="button" @click="open = ! open" class="btn-dashboard align-middle">
        <span x-show="!open">{{ $btnName ?? 'Open Form ' }}</span>
        <span x-show="open">Close Form</span>
    </button>

    {{-- Form container --}}
    <div x-show="open" x-transition class="w-full p-1 bg-slate-500 flex justify-center mt-4">
        <form action="{{ $actionUrl }}" method="POST" class="w-full p-3 space-y-5">
            @csrf

            {{ $slot }}


            {{-- Submit --}}
            <button type="submit" class="btn-dashboard my-5">
                Save
            </button>
            <button type="button" @click="open = false"
                class="px-4 py-2 bg-gray-400 text-black rounded-lg hover:bg-gray-500">
                Cancel
            </button>

        </form>


    </div>
</div>
