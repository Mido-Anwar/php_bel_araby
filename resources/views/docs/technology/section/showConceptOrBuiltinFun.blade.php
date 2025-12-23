<x-app-layout>
    <x-slot name="header">
        @if (isset($concept))
            <x-dashboard-head :text="$concept->name" />
        @elseif (isset($builtinFunction))
            <x-dashboard-head :text="$builtinFunction->name" />
        @endif

    </x-slot>


    <x-dashboard-container>
        {{-- Section Card --}}
        @if ( isset($builtinFunction))
            <x-slot name="div">
                <x-dashboard-head :text="$concept->name" />

                <x-dashboard-paragraph :text="$concept->syntax" />
            </x-slot>
        @elseif (isset($concept))
            <x-slot name="div">
                <x-dashboard-head :text="$concept->name" />

                <x-dashboard-paragraph :text="$concept->syntax" />
            </x-slot>
        @endif
    </x-dashboard-container>

    </div>
</x-app-layout>
