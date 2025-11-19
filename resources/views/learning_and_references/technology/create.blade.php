<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Create New Technology'" />
    </x-slot>

        <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Add Technology'" />
            <x-dashboard-paragraph :text="'Fill in the details below to add a new technology to the learning and reference materials.'" />
        </x-slot>
            <x-hidden-form :action-url="route('tech.store')" :open="false" :fields="[
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Technology Name',
                    'placeholder' => 'Enter Technology Name',
                    'value' => old('name'),
                ],
                [
                    'name' => 'description',
                    'type' => 'textarea',
                    'label' => 'Technology Description',
                    'placeholder' => 'Enter Technology Description',
                    'rows' => 5,
                    'value' => old('description'),
                ],
            ]">
            </x-hidden-form>
        </x-dashboard-container>

</x-app-layout>
