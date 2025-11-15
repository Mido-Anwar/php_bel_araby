<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Edit Role & Permission'" />
    </x-slot>


        <x-dashboard-container>
            @if (isset($role) && request()->routeIs('role.edit', $role->id))
                <x-dashboard-head :text="'Edit role'" />

                <x-hidden-form :action-url="route('role.update', $role->id)" method="PUT" :fields="[
                    [
                        'name' => 'name',
                        'type' => 'text',
                        'label' => '',
                        'placeholder' => '',
                        'value' => $role->name,
                    ],
                ]">
                    @foreach ($permissions as $permission)
                        <div class="my-5">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                            <label class="ml-2 text-gray-700">{{ $permission->name }}</label>
                        </div>
                    @endforeach

                </x-hidden-form>
            @elseif (isset($permission) && request()->routeIs('permission.edit', $permission->id))
                <x-dashboard-head :text="'Edit permission'" />
                <x-hidden-form :action-url="route('permission.update', $permission->id)" method="PUT" :fields="[
                    [
                        'name' => 'name',
                        'type' => 'text',
                        'label' => 'permission name',
                        'placeholder' => 'Enter permission name',
                        'value' => $permission->name,
                    ],
                ]">
                </x-hidden-form>
            @endif
        </x-dashboard-container>
   

</x-app-layout>
