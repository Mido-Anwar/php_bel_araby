<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Edit Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            @if (request()->routeIs('role.edit', $role->id))
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
            @elseif (request()->routeIs('permission.edit', $permission->id))
                <x-dashboard-head :text="'Edit permission'" />
                <x-hidden-form :action-url="route('permission.update', $permission->id)" method="PUT" :fields="[
                    [
                        'name' => 'user_id',
                        'type' => 'hidden',
                        'label' => '',
                        'placeholder' => 'Enter Post title',
                        'value' => auth()->user()->id,
                    ],
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
