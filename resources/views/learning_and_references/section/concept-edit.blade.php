<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $concept->name" />

    </x-slot>


    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="$concept->name" />
            <x-dashboard-paragraph :text="$concept->description" />
        </x-slot>
        <x-hidden-form :action-url="route('concept.update', $concept->id)" :open="false" :fields="[
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'builtin function Title',
                'placeholder' => 'Enter builtin function title',
                'value' => $concept->name,
            ],
            [
                'name' => 'syntax',
                'type' => 'textarea',
                'label' => 'Syntax',
                'placeholder' => 'Enter syntax',
                'value' => $concept->syntax,
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
                'label' => 'Description',
                'placeholder' => 'Enter description',
                'value' => $concept->example,
            ],
            [
                'name' => 'example',
                'type' => 'textarea',
                'label' => 'Example Code',
                'placeholder' => 'Write an example...',
                'rows' => 5,
                'value' => $concept->example,
            ],
            ['name' => 'section_id', 'type' => 'hidden', 'value' => $concept->section_id],
        ]" />


    </x-dashboard-container>

</x-app-layout>
