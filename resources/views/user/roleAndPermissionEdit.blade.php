<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Edit Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <x-dashboard-head :text="'Edit role'" />
            @if (route('role.edit', $role->id))
                <x-hidden-form :action-url="route('role.update', $role->id)" method="PUT">
                    
                </x-hidden-form>
            @endif
        </x-dashboard-container>
    </div>

</x-app-layout>
