@props(['section'])
{{-- Concepts List --}}
<x-dashboard-container>
    <x-slot name="div">
        <x-dashboard-head :text="Str::upper($section->title) . ' Concepts'" />
        <x-dashboard-paragraph :text="'Add new concept to the section: ' . $section->title" />
    </x-slot>

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
    {{-- List Concepts --}}
<x-dashboard-container>
    <x-slot name="div">
        <x-dashboard-head :text="Str::upper($section->title) . ' Concepts List'" />
    </x-slot>


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
</x-dashboard-container>


