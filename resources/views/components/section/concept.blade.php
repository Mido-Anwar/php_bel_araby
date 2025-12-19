@props(['section'])
{{-- Concepts List --}}
<div>
    <x-slot name="div">
    <x-dashboard-head :text="Str::upper($section->title) . ' Concepts'" />
    <x-dashboard-paragraph :text="'Add new concept to the section: ' . $section->title" />
    </x-slot>
    <x-dashboard-head :text="'Add New Concept'" />
    <x-hidden-form :action-url="route('concept.store')" :open="false" :formBtnName="'Add New Concept'">
        <div>
            <x-input-label for="name" :value="'Concept Name'" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="syntax" :value="'Syntax'" />
            <textarea id="syntax" name="syntax" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required></textarea>
            <x-input-error :messages="$errors->get('syntax')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="example" :value="'Example Code'" />
            <textarea id="example" name="example" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required></textarea>
            <x-input-error :messages="$errors->get('example')" class="mt-2" />
        </div>
        <input type="hidden" name="section_id" value="{{ $section->id }}">

    </x-hidden-form>

    <x-message :message="session('success-store-concept')" :color="'green'" />
    {{-- List Concepts --}}
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="Str::upper($section->title) . ' Concepts '" />
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
</div>