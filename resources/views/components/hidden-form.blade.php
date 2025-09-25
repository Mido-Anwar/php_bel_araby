<div class="relative inline-block w-full" x-data="{ open: @json($open) }">
    {{-- Toggle button --}}
    <button type="button" @click="open = ! open"
        class="px-4 py-2 bg-gray-600 text-white font-bold rounded">
        <span x-show="!open">Add Item</span>
        <span x-show="open">Close Form</span>
    </button>

    {{-- Form container --}}
    <div x-show="open" x-transition
        class="w-full flex justify-center mt-4">
        <form method="POST" action="{{ $actionUrl }}" class="w-full form-hidden p-4 rounded shadow">
            @csrf

            {{-- Custom content passed from parent (slot) --}}
            {{ $slot }}

            {{-- Action buttons --}}
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" @click="open = false" class="px-3 py-1 bg-gray-600 border rounded text-white">
                    Cancel
                </button>
                <button type="submit" class="px-3 py-1 bg-gray-600 text-white border rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
