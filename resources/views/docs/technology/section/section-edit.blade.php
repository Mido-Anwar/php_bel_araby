<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit Section : ' . $section->title" />
    </x-slot>


    <x-slot name="div">
        <x-dashboard-head :text="'Edit Section Details'" />
    </x-slot>
    <x-hidden-form :action-url="route('section.update', $section->id)" :open="false" :btnName="'Edit Section'" :formBtnName="'Update Section'">
        <div>
            <x-input-label for="title" :value="'Section Title'" />
            <input type="text" name="title" id="title" value="{{ $section->title }}" required autofocus>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="content" :value="'Content'" />
            <textarea id="content" name="content" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ old('content', $section->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <input type="hidden" name="technology_id" value="{{ $section->technology_id }}">
    </x-hidden-form>
</x-app-layout>