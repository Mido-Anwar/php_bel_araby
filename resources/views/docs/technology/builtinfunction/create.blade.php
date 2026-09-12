<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Builtin Function'" />
    </x-slot>
    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="'Add New Builtin Function'" />
        </x-slot>

    </x-dashboard-container>

    <form class="space-y-6 form-style" action="{{ route('builtinfunction.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <x-input-label for="title" :value="'Title'" />
            <x-text-input id="title" name="title" type="text"  required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="mb-6">
            <x-input-label for="tag_name" :value="'Tag Name'" />
            <input id="tag_name" name="tag_name" type="text" required autofocus />
            <x-input-error :messages="$errors->get('tag_name')" class="mt-2" />
        </div>
        <input type="hidden" name="technology_id" value="{{ $technology->id }}">

        <div class="mb-6">
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Enter description" required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>



        <div>
            <x-primary-button>
                {{ __('Create Builtin Function') }}
            </x-primary-button>
            <a href="{{ route('technology.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>



</x-app-layout>
