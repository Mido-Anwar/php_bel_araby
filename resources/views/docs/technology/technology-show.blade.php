<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$technology->name" />
        <x-message :message="session('success-update-technology')" color="blue" />
        <x-message :message="session('success-store-section')" color="green" />
        <x-message :message="session('success-delete-section')" color="red" />
        <x-message :message="session('success-store-builtinFunction')" color="green" />
        <x-message :message="session('success-delete-builtinFunction')" color="red" />
    </x-slot>


    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="$technology->name" />

            <a href="{{ route('technology.edit', $technology->id) }}" class="btn-edit">
                + Edit Technology
            </a>
            <x-dashboard-paragraph :text="$technology->description" />
        </x-slot>
    </x-dashboard-container>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Sections under ' . $technology->name" />
            <a href="{{ route('section.create', $technology->id) }}" class="btn-create">
                + Add Section
            </a>
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
        </x-slot>
    </x-dashboard-container>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Built-in Functions under ' . $technology->name" />
            <a href="{{ route('builtinfunction.create', $technology->id) }}" class="btn-create">
                + Add Built-in Function
            </a>
                    @if ($technology->builtinfunctions->isEmpty())
            <x-dashboard-paragraph :text="'No sections available.'" />
        @endif
        @foreach ($technology->builtinfunctions as $builtinfunction)
            <div class="btn-container">
                <a href="{{ route('builtinfunction.show', $builtinfunction->id) }}" class="btn-show">
                    {{ $builtinfunction->title }}
                </a>
                @if (Auth::user()->hasRole('super-admin'))
                    <x-delete-form :action-url="route('builtinfunction.destroy', $builtinfunction)" />
                @endif
            </div>
        @endforeach

        </x-slot>

    </x-dashboard-container>
</x-app-layout>
