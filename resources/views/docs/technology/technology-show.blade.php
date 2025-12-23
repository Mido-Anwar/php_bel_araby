<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$technology->name" />
    </x-slot>


    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="$technology->name" />

            <a href="{{ route('technology.edit', $technology->name) }}" class="btn-edit">
                + Edit Technology
            </a>
            <x-dashboard-paragraph :text="$technology->description" />
        </x-slot>
    </x-dashboard-container>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Sections under ' . $technology->name" />
            <x-hidden-form :action-url="route('section.store')" :open="false" :btnName="'Add Section'" :formBtnName="'Add Section'">

                <input type="hidden" name="technology_id" value="{{ $technology->id }}">
                <div>
                    <x-input-label for="title" :value="'Section Title'" />
                    <input type="text" name="title" id="title" required autofocus>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="content" :value="'Section Content'" />
                    <textarea id="content" name="content" rows="5"
                        class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        required></textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>

            </x-hidden-form>

        </x-slot>
        @if ($technology->sections->isEmpty())
        <x-dashboard-paragraph :text="'No sections available.'" />
        @endif
        @foreach ($technology->sections as $section)
        <div class="btn-container">
            <a href="{{ route('section.show', $section->id) }}" class="btn-show">
                {{ $section->title }}
            </a>
            @if (Auth::user()->hasRole('super-admin'))
            <x-delete-form :action-url="route('section.destroy', $section->id)" />
            @endif
        </div>
        @endforeach

        <x-message :message="session('success-store-section')" color="green" />
        <x-message :message="session('success-delete-section')" color="red" />
    </x-dashboard-container>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Built-in Functions under ' . $technology->name" />
            <a href="{{ route('builtinfunction.create', $technology->id) }}" class="btn-show">
                + Add Built-in Function
            </a>
        </x-slot>
        @if ($technology->builtinfunctions->isEmpty())
        <x-dashboard-paragraph :text="'No sections available.'" />
        @endif
        @foreach ($technology->builtinfunctions as $builtinfunction)
        <div class="btn-container">
            <a href="{{ route('builtinfunction.show', $builtinfunction->id) }}" class="btn-show">
                {{ $builtinfunction->name }}
            </a>
            @if (Auth::user()->hasRole('super-admin'))
            <x-delete-form :action-url="route('builtinfunction.destroy', $builtinfunction)" />
            @endif
        </div>
        @endforeach
        <x-message :message="session('success-store-section')" color="green" />
        <x-message :message="session('success-delete-section')" color="red" />
    </x-dashboard-container>
</x-app-layout>