<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $concept->name" />

        <x-dashboard-paragraph :text="'edit concept '" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <div class="flex justify-between items-center mb-4 break-words">
                <x-dashboard-head :text="$concept->name" />

            </div>
         <x-dashboard-paragraph :text="$concept->description" />
         
            <h2>concept edit</h2>
            <x-hidden-form :action-url="route('concept.update', $concept->id)" :open="false" :fields="[
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Concept Title',
                    'placeholder' => 'Enter concept title',
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
            @if (session('success_concept-update'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success_concept-update') }}
                </div>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
