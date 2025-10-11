<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($builtInFunction->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <div class="flex justify-between items-center mb-4 break-words">
                <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100">
                    {{ Str::upper($builtInFunction->name) }}
                </h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed break-words text-lg">
                {{ $builtInFunction->description }}
            </p>
            <h2>Builtin Function edit</h2>
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

            {{-- Success Message --}}
            @if (session('update-success_builtin'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('update-success_builtin') }}
                </div>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
