<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$technology->name" />
        <x-dashboard-paragraph :text="'technology details and its sections '" />
    </x-slot>
    <div class="py-12">
        <x-dashboard-container>
            <div class="my-2 flex justify-end">
                <a href="{{ route('tech.edit', $technology->name) }}" class="px-4 py-2  text-white rounded-md font-bold"
                    style="background: green;">
                    + Edit Technology
                </a>
            </div>
            <x-dashboard-head :text="$technology->name" />
            <x-dashboard-paragraph :text="$technology->description" />
        </x-dashboard-container>
        <x-dashboard-container>
            <x-dashboard-head :text="'Sections under ' . $technology->name" />
            <div class="w-1/2">
                @if ($technology->sections->isEmpty())
                    <x-dashboard-paragraph :text="'No sections available. Please add a section.'" />
                @endif
                @foreach ($technology->sections as $section)
                    <div class="btn-container">
                        <a href="{{ route('section.show', $section->id) }}" class="btn-show">
                            {{ $section->title }}
                        </a>
                        <form action="{{ route('section.destroy', $section->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this technology?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                X
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>
            <x-message :message="session('success-store-section')" color="green" />
            <x-message :message="session('success-delete-section')" color="red" />
        </x-dashboard-container>
        <x-dashboard-container>

            <x-dashboard-head :text="'Add New Section to ' . $technology->name" />

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
    </div>
</x-app-layout>
