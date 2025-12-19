<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $technology->name" />
    </x-slot>


    <x-slot name="div">
        <x-dashboard-head :text="'Edit Technology Details'" />
        <x-dashboard-paragraph :text="'Update the information for the technology below.'" />
    </x-slot>

    <x-hidden-form :action-url="route('technology.update', $technology->name)" :open="false" :btnName="'Edit Technology'" :formBtnName="'Update Technology'">

        <div>
            <x-input-label for="name" :value="'Technology Name'" />
            <input type="text" name="name" id="name" value="{{ $technology->name }}" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="'Technology Description'" />
            <textarea id="description" name="description" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ old('description', $technology->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

    </x-hidden-form>
</x-app-layout>