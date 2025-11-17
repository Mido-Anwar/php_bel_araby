<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$technology->name" />
    </x-slot>


    <x-dashboard-container>
        <x-slot name="div">
            <a href="{{ route('tech.edit', $technology->name) }}" class="btn-edit">
                + Edit Technology
            </a>

            <x-dashboard-head :text="$technology->name" />
            <x-dashboard-paragraph :text="$technology->description" />
        </x-slot>
    </x-dashboard-container>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Sections under ' . $technology->name" />
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
            <x-dashboard-head :text="'Add New Section to ' . $technology->name" />
        </x-slot>
        <x-hidden-form :action-url="route('section.store')" :open="false" :fields="[
            [
                'name' => 'technology_id',
                'type' => 'hidden',
                'label' => '',
                'placeholder' => 'Enter Post title',
                'value' => $technology->id,
            ],
            [
                'name' => 'title',
                'type' => 'text',
                'label' => 'Title',
                'placeholder' => 'Enter title',
            ],
            [
                'name' => 'content',
                'type' => 'textarea',
                'label' => 'content',
                'placeholder' => 'Write an Content...',
                'rows' => 5,
            ],
        ]">

        </x-hidden-form>

    </x-dashboard-container>

</x-app-layout>
