@props(['actionUrl', 'open' => false, 'fields' => [],'btnName' => 'Open Form'])
<div class="inline-block w-full" x-data="{ open: @json($open) }">
    {{-- Toggle button --}}
    <button type="button" @click="open = ! open" class="btn-dashboard">
        <span x-show="!open">{{$btnName ?? 'Open Form '}}</span>
        <span x-show="open">Close Form</span>
    </button>

    {{-- Form container --}}
    <div x-show="open" x-transition class="w-full flex justify-center mt-4">
        <form action="{{ $actionUrl }}" method="POST" class="w-full space-y-5">
            @csrf

            @foreach ($fields as $field)
                <div>
                    {{-- Label (اختياري) --}}
                    @if (!empty($field['label']))
                        <label for="{{ $field['name'] }}"
                            class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                            {{ $field['label'] }}
                        </label>
                    @endif

                    {{-- Dynamic input types --}}
                    @switch($field['type'])
                        @case('textarea')
                            <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}"
                                rows="{{ $field['rows'] ?? 3 }}" value=""
                                class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                {{ $field['value'] ?? '' }}
                            </textarea>
                        @break

                        @case('select')
                            <select id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="{{ $field['value'] ?? '' }}"
                                class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                @foreach ($field['options'] ?? [] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        @break

                        @case('checkbox')
                            <input type="checkbox" id="{{ $field['name'] }}"
                                name="{{ $field['name'] }} "value="{{ $field['value'] ?? '' }}"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        @break

                        @default
                            <input type="{{ $field['type'] ?? 'text' }}" id="{{ $field['name'] }}"
                                name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}"
                                value="{{ $field['value'] ?? '' }}"
                                class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @endswitch
                </div>
            @endforeach

            {{-- Submit --}}
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Save
            </button>
            <button type="button" @click="open = false"
                class="px-4 py-2 bg-gray-400 text-black rounded-lg hover:bg-gray-500">
                Cancel
            </button>

        </form>


    </div>
</div>
