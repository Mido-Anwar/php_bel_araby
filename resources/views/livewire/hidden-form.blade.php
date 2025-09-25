<div class="relative inline-block w-full">
    {{-- زرار الفتح / القفل --}}
    <button wire:click="toggle"
            class="px-4 py-2 bg-gray-600 text-white font-bold rounded">
        {{ $open ? 'Close Form' : 'Add Item' }}
    </button>

    {{-- الفورم --}}
    @if($open)
        <div
            class="w-full flex justify-center mt-4 transition-all duration-500 ease-in-out"
            x-data
            x-init="$el.style.opacity = 0; setTimeout(() => $el.style.opacity = 1, 50)"
        >
            <form method="POST" action="{{ $actionUrl }}" class="w-1/2 bg-white p-4 rounded shadow">
                @csrf

                {{-- Hidden model ID --}}
                @if($modelId)
                    <input type="hidden" name="model_id" value="{{ $modelId }}">
                @endif

                {{-- Loop on fields --}}
                @foreach($fields as $name => $options)
                    <div class="mb-3">
                        <label class="block text-sm font-medium">{{ $options['label'] }}</label>

                        @if(($options['type'] ?? 'text') === 'textarea')
                            <textarea name="{{ $name }}"
                                      placeholder="{{ $options['placeholder'] ?? 'Enter ' . strtolower($options['label']) }}"
                                      class="w-full border rounded px-2 py-1"></textarea>
                        @else
                            <input type="{{ $options['type'] ?? 'text' }}"
                                   name="{{ $name }}"
                                   placeholder="{{ $options['placeholder'] ?? 'Enter ' . strtolower($options['label']) }}"
                                   class="w-full border rounded px-2 py-1">
                        @endif
                    </div>
                @endforeach

                {{-- أزرار التحكم --}}
                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="toggle"
                            class="px-3 py-1 border rounded">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-3 py-1 bg-green-600 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
