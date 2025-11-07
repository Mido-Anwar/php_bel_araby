<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $concept->name" />

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <div class="flex justify-between items-center mb-4 break-words">
                <x-dashboard-head :text="$concept->name" />
            </div>
            <x-dashboard-paragraph :text="$concept->description" />
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

            {{-- Success Message --}}
            <x-message :message="session('success-update-concept')" :color="'blue'" />
        </x-dashboard-container>
    </div>
</x-app-layout>
