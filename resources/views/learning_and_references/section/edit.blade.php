<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Section') }}
        </h2>

        <p>
            edit section details and content below.
        </p>

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <x-hidden-form :action-url="route('section.update', $section->id)" :open="true" :fields="[
                [
                    'name' => 'technology_id',
                    'type' => 'hidden',
                    'value' => $section->technology_id,
                ],
                [
                    'name' => 'title',
                    'type' => 'text',
                    'label' => 'Section Title',
                    'placeholder' => 'Enter section title',
                    'value' => $section->title,
                ],
                [
                    'name' => 'content',
                    'type' => 'textarea',
                    'label' => 'Content',
                    'placeholder' => 'Enter section content',
                    'value' => $section->content,
                    'rows' => 10,
                ],
            ]">
            </x-hidden-form>

        </x-dashboard-container>
    </div>
</x-app-layout>
