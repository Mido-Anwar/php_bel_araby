<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Create Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>

            @if (request()->routeIs('role.create'))
                <x-dashboard-head :text="'Add role'" />

                <x-hidden-form :action-url="route('role.store')" method="POST" :fields="[
                        [
                            'name' => 'title',
                            'type' => 'text',
                            'label' => 'Role Name',
                            'placeholder' => 'Enter Role Name',
                            'value' => '',
                        ],]" >
                </x-hidden-form>
            @elseif(request()->routeIs('permission.create'))
                <x-dashboard-head :text="'Add permission'" />

                <x-hidden-form :action-url="route('permission.store')" method="POST" :fields="[
                        [
                            'name' => 'user_id',
                            'type' => 'hidden',
                            'label' => '',
                            'placeholder' => '',
                            'value' => '',
                        ],
                        [
                            'name' => 'name',
                            'type' => 'text',
                            'label' => 'permission name',
                            'placeholder' => 'Enter permission name',
                            'value' => '',
                        ],]">

                </x-hidden-form>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
