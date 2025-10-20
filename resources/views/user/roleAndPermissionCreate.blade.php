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
                        'name' => 'name',
                        'type' => 'text',
                        'label' => 'Role Name',
                        'placeholder' => 'Enter Role Name',
                        'value' => '',
                    ],
                ]">

                    <h3> give role a permission</h3>
                    @foreach ($permissions as $permission)
                        <div class="my-4">
                            <input type="checkbox" name="permissions[]" id="{{ $permission->name }}"
                                value="{{ $permission->name }}">
                            <label class="ml-2 text-gray-700" for="{{ $permission->name }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach

                </x-hidden-form>
            @elseif(request()->routeIs('permission.create'))
                <x-dashboard-head :text="'Add permission'" />

                <x-hidden-form :action-url="route('permission.store')" method="POST" :fields="[
                    [
                        'name' => 'name',
                        'type' => 'text',
                        'label' => 'permission name',
                        'placeholder' => 'Enter permission name',
                        'value' => '',
                    ],
                ]">

                </x-hidden-form>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
