<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Concept'" />
    </x-slot>

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

</x-app-layout>