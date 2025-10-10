@props(['section'])
{{-- Concepts List --}}
<div
    class="my-6 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-800 dark:to-gray-900">

    {{-- Add Concept --}}
    <div class="mb-6 p-6 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-4">
            Add Concept to <span class="">{{ Str::upper($section->title) }}</span>
        </h2>

        <x-hidden-form :action-url="route('concept.store')" :open="false" :fields="[
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Concept Title',
                'placeholder' => 'Enter concept title',
            ],
            [
                'name' => 'syntax',
                'type' => 'textarea',
                'label' => 'Syntax',
                'placeholder' => 'Enter syntax',
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
                'label' => 'Description',
                'placeholder' => 'Enter description',
            ],
            [
                'name' => 'example',
                'type' => 'textarea',
                'label' => 'Example Code',
                'placeholder' => 'Write an example...',
                'rows' => 5,
            ],
            ['name' => 'section_id', 'type' => 'hidden', 'value' => $section->id],
        ]" />

        @if (session('success_concept'))
            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                {{ session('success_concept') }}
            </div>
        @endif
    </div>

    {{-- List Concepts --}}
    <div>
        <h2 class="font-bold text-xl mb-4 text-gray-800 dark:text-gray-100">
            {{ Str::upper($section->title) }} Concepts
        </h2>

        <div class="space-y-3">
            @if ($section->concepts->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">No concepts added yet.</p>
            @endif
            @foreach ($section->concepts as $concept)
                <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">
                    <a href="{{ route('concept.show', $concept->id) }}" class="btn-show">{{ $concept->name }}</a>
                    <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('concept.destroy', $concept->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this concept?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">X</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
