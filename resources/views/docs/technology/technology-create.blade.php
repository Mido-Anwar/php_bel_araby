<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Create New Technology'" />
    </x-slot>

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Add Technology'" />
            <x-dashboard-paragraph :text="'Fill in the details below to add a new technology to the learning and reference materials and add home page article .'" />
        </x-slot>
        <form action="{{ route('technology.store') }}" method="POST" enctype="multipart/form-data"
            class="mt-6 space-y-6 form-style">
            <div>
                <x-input-label for="name" :value="'Technology Name'" />
                <input type="text" name="name" id="name" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="'Technology Description'" />
                <textarea id="description" name="description" rows="5"
                    class="mt-1 block w-full border-gray-300
                    focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create Technology') }}</x-primary-button>
                <a href="{{ route('technology.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>

    </x-dashboard-container>
</x-app-layout>
