<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Create Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <x-dashboard-head :text="'Add role'" />
            
            <x-hidden-form :action="route('roles.store')" method="POST">

            </x-hidden-form>
        </x-dashboard-container>
    </div>
</x-app-layout>
