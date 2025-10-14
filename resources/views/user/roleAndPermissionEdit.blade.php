<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Edit Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <x-dashboard-head :text="'Edit role'" />

            <x-hidden-form :action="route('roles.update', $role->id)" method="PUT">
             
            </x-hidden-form>
        </x-dashboard-container>
    </div>

</x-app-layout>
