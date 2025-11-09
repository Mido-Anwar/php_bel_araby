<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $technology->name" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-paragraph :text="'edit technology name &  description'" />
        <x-dashboard-container>
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
