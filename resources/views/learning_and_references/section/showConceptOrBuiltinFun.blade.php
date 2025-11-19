<x-app-layout>
    <x-slot name="header">
        @if (route('concept.show', $concept->id))
            <x-dashboard-head :text="$concept->name" />
        @elseif (route('builtin.show', $builtinFunction->id))
            <x-dashboard-head :text="$builtinFunction->name" />
        @endif

    </x-slot>


    <x-dashboard-container>
        {{-- Section Card --}}
        @if (route('concept.show', $concept->id))
            <x-slot name="div">
                <x-dashboard-head :text="$concept->name" />

                <x-dashboard-paragraph :text="$concept->syntax" />
            </x-slot>
        @elseif (route('builtin.show', $builtinFunction->id))
            <x-slot name="div">
                <x-dashboard-head :text="$builtinFunction->name" />

                <x-dashboard-paragraph :text="$builtinFunction->syntax" />
            </x-slot>
        @endif

    </x-dashboard-container>
    </div>
</x-app-layout>
