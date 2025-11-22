    @props(['section'])
    {{-- BuiltinFunctions List --}}

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="Str::upper($section->title) . ' Builtin Functions'" />
            <x-dashboard-paragraph :text="'Add Builtin Function to ' . Str::upper($section->title)" />
        </x-slot>
        <x-hidden-form :action-url="route('builtin.store')" :open="false" :fields="[
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Builtin Function Title',
                'placeholder' => 'Enter builtin function title',
            ],
            [
                'name' => 'syntax',
                'type' => 'textarea',
                'label' => 'Syntax',
                'placeholder' => 'Enter syntax',
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
                'label' => 'Description',
                'placeholder' => 'Enter description',
            ],
            [
                'name' => 'example',
                'type' => 'textarea',
                'label' => 'Example Code',
                'placeholder' => 'Write an example...',
                'rows' => 5,
            ],
            ['name' => 'section_id', 'type' => 'hidden', 'value' => $section->id],
        ]" />

        <x-message :message="session('success-store-builtinFunction')" :color="'green'" />
          {{-- List Builtin Functions --}}
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="Str::upper($section->title) . ' Builtin Functions List'" />
        </x-slot>



        @if ($section->builtinFunctions->isEmpty())
            <p class="text-gray-600 dark:text-gray-300">No builtin functions added yet.</p>
        @endif
        @foreach ($section->builtinFunctions as $function)
            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">
                <a href="{{ route('builtin.show', $function->id) }}" class="btn-show">{{ $function->name }}</a>
                <a href="{{ route('builtin.edit', $function->id) }}" class="btn-edit">Edit</a>
                @if (Auth::user()->hasRole('super-admin'))
                    <form action="{{ route('builtin.destroy', $function->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this function?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">X</button>
                    </form>
                @endif
            </div>
        @endforeach
    </x-dashboard-container>
    </x-dashboard-container>


