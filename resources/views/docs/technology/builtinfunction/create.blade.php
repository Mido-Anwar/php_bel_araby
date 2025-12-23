<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Builtin Function'" />
    </x-slot>
    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="'Add New Builtin Function'" />
        </x-slot>

    </x-dashboard-container>

    <x-hidden-form :action-url="route('builtinfunction.store')" :open="false" :btnName="'Add Builtin Function'" :formBtnName="'Add Builtin Function'">
        @csrf
        <div class="mb-6">
            <x-input-label for="name" :value="'Name'" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-6">
            <x-input-label for="tag_name" :value="'Tag Name'" />
            <input id="" name="tag_name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('tag_name')" class="mt-2" />
        </div>
        <input type="hidden" name="technology_id" value="{{ $technology->id }}">
        <div class="mb-6">
            <x-input-label for="syntax" :value="'Syntax'" />
            <textarea name="syntax" id="syntax" class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Enter syntax" required></textarea>
            <x-input-error :messages="$errors->get('syntax')" class="mt-2" />
        </div>

        <div class="mb-6">
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Enter description" required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mb-6">
            <x-input-label for="example" :value="'Example'" />
            <textarea id="example" name="example" class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Enter example" required></textarea>
            <x-input-error :messages="$errors->get('example')" class="mt-2" />
        </div>
    </x-hidden-form>



</x-app-layout>