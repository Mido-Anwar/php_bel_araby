<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Technology') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 max-w-2xl">
            Use the form below to create a new technology. Provide a name and a brief description to get started.
        </p>
    </x-slot>

    <div class="py-12">
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
            {{-- Success Message --}}
            @if (session('success-created-tech'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success-created-tech') }}
                </div>
            @endif

        </x-dashboard-container>
    </div>
</x-app-layout>
