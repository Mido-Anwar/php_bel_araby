<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit Concept : ' . $concept->title" />

    </x-slot>

    <x-slot name="div">
        <x-dashboard-head :text="$concept->title" />
        <x-dashboard-paragraph :text="$concept->description" />
    </x-slot>

    <form action="{{ route('concept.update', $concept->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 form-style">
        @csrf
        <div>
            <x-input-label for="title" :value="'Concept Title'" />
            <input type="text" name="title" id="title" value="{{ $concept->title }}" required autofocus>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ $concept->description }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <input type="hidden" name="section_id" value="{{ $concept->section_id }}">

        <div>
            <x-primary-button>
                {{ __('Update Concept') }}
            </x-primary-button>
            <a href="{{ route('section.show', $concept->section_id) }}" class="btn-cancel">Cancel</a>
        </div>

    </form>

</x-app-layout>
