<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $technology->name" />
    </x-slot>


        <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Edit Technology Details'" />
            <x-dashboard-paragraph :text="'Update the information for the technology below.'" />
        </x-slot>
            <x-hidden-form :action-url="route('tech.update', $technology->name)" :open="true" :fields="[
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Technology Name',
                    'placeholder' => 'Enter Technology Name',
                    'value' => old('name', $technology->name),
                ],
                [
                    'name' => 'description',
                    'type' => 'textarea',
                    'label' => 'Technology Description',
                    'placeholder' => 'Enter Technology Description',
                    'rows' => 5,
                    'value' => old('description', $technology->description),
                ],
            ]" :method="'PUT'">
            </x-hidden-form>
        </x-dashboard-container>
    </div>
</x-app-layout>
