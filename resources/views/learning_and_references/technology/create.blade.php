<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Create New Technology'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-paragraph :text="'add new technology '" />
        <x-dashboard-container>
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
    </div>
</x-app-layout>
