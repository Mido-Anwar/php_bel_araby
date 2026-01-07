<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit Concept : ' . $concept->title" />

    </x-slot>



    <x-slot name="div">
        <x-dashboard-head :text="$concept->title" />
        <x-dashboard-paragraph :text="$concept->description" />
    </x-slot>
    <x-hidden-form :action-url="route('concept.update', $concept->id)" :open="false" :btnName="'Edit Concept'" :formBtnName="'Update Concept'">

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

    </x-hidden-form>

</x-app-layout>