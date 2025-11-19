<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $section->title" />

        <x-dashboard-paragraph :text="'edit section '" />

    </x-slot>


    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Edit Section Details'" />
            <x-dashboard-paragraph :text="'Update the information for the section below.'" />
        </x-slot>
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

</x-app-layout>
