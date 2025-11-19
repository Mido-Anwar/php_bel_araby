<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $builtInFunction->name" />

    </x-slot>

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="$builtInFunction->name" />
            <x-dashboard-paragraph :text="$builtInFunction->description" />
        </x-slot>
        <x-hidden-form :action-url="route('builtin.update', $builtInFunction->id)" :open="false" :fields="[
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'builtin function Title',
                'placeholder' => 'Enter builtin function title',
                'value' => $builtInFunction->name,
            ],
            [
                'name' => 'syntax',
                'type' => 'textarea',
                'label' => 'Syntax',
                'placeholder' => 'Enter syntax',
                'value' => $builtInFunction->syntax,
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
                'label' => 'Description',
                'placeholder' => 'Enter description',
                'value' => $builtInFunction->example,
            ],
            [
                'name' => 'example',
                'type' => 'textarea',
                'label' => 'Example Code',
                'placeholder' => 'Write an example...',
                'rows' => 5,
                'value' => $builtInFunction->example,
            ],
            ['name' => 'section_id', 'type' => 'hidden', 'value' => $builtInFunction->section_id],
        ]" />

    </x-dashboard-container>
   
</x-app-layout>
