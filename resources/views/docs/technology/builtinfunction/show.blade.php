<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Builtin Function : ' . $builtInFunction->name" />
        
        <x-message :message="session('success-update-builtinFunction')" color="blue" />
    </x-slot>

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="$builtInFunction->name" />
            <a href="{{ route('builtinfunction.edit', $builtInFunction->id) }}" class="btn-edit">edit</a>
            <x-dashboard-paragraph :text="$builtInFunction->description" />
        </x-slot>
    </x-dashboard-container>
</x-app-layout>