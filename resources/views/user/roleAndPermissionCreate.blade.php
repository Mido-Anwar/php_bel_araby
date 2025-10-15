<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Create Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <x-dashboard-head :text="'Add role'" />
            @if (route('roles.create'))
                <x-hidden-form :action="route('role.store')" method="POST">

                </x-hidden-form>
            @endif

        </x-dashboard-container>
    </div>
</x-app-layout>
