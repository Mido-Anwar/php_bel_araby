@props(['section'])
{{-- Concepts List --}}
<x-dashboard-container>
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

    <x-message :message="session('success-store-concept')" :color="'green'" />
</x-dashboard-container>

{{-- List Concepts --}}
<x-dashboard-container>
    <h2 class="font-bold text-xl mb-4 text-gray-800 dark:text-gray-100">
        {{ Str::upper($section->title) }} Concepts
    </h2>


    @if ($section->concepts->isEmpty())
        <p class="text-gray-600 dark:text-gray-300">No concepts added yet.</p>
    @endif
    @foreach ($section->concepts as $concept)
        <div class="btn-container">
            <a href="{{ route('concept.show', $concept->id) }}" class="btn-show">{{ $concept->name }}</a>
            <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">Edit</a>
            @if (Auth::user()->hasRole('super-admin'))
                <form action="{{ route('concept.destroy', $concept->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this concept?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">X</button>
                </form>
            @endif
        </div>
    @endforeach
</x-dashboard-container>
