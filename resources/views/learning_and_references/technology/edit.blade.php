<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit: ' . $technology->name" />
        <x-dashboard-paragraph :text="'edit technology '" />
    </x-slot>

    <div class="py-12">
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
            {{-- Success Message --}}
            @if (session('success-updated-tech'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success-updated-tech') }}
                </div>
            @endif

        </x-dashboard-container>
    </div>
</x-app-layout>
