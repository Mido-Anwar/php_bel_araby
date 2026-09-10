    <x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="' Section'"/>
    </x-slot>


    <x-slot name="div">
        <x-dashboard-head :text="'Create Section Details'" />
    </x-slot>
    <form action="{{ route('section.store') }}" method="POST" enctype="multipart/form-data">
        <div>
            <x-input-label for="title" :value="'Section Title'" />
            <input type="text" name="title" id="title" value="" required autofocus>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="content" :value="'Content'" />
            <textarea id="content" name="content" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <input type="hidden" name="technology_id" value="{{ $technology->id }}">

        <div class="mt-4">
            <x-primary-button>
                {{ __('Create Section') }}
            </x-primary-button>
    </form>
</x-app-layout>
