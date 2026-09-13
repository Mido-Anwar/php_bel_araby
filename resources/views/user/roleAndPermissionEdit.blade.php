<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
    </x-slot>



    @if (isset($role) && request()->routeIs('role.edit', $role->id))
        <x-slot name="div">
            <x-dashboard-head :text="'Edit role'" />
        </x-slot>
        <form action="{{ route('role.update', $role->id) }}" method="POST" class="form-style">
            @csrf


            <div>
                <x-input-label for="name" :value="'Role Name'" />
                <input type="text" name="name" id="name" value="{{ $role->name }}" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <h3> update role permissions</h3>

            @foreach ($permissions as $permission)
                <div class="my-5">
                    <label class="ml-2 text-gray-700">{{ $permission->name }}</label>

                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                </div>
            @endforeach
            <div>
                <x-primary-button class="mt-4">
                    {{ __('Update Role') }}
                </x-primary-button>

                <a href="{{ route('users.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    @elseif (isset($permission) && request()->routeIs('permission.edit', $permission->id))
        <x-slot name="div">
            <x-dashboard-head :text="'Edit permission'" />
        </x-slot>
        <form action="{{ route('permission.update', $permission->id) }}" method="POST" class="form-style">
            @csrf

            <div>
                <x-input-label for="name" :value="'Permission Name'" />
                <input type="text" name="name" id="name" value="{{ $permission->name }}" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-primary-button class="mt-4">
                    {{ __('Update Permission') }}
                </x-primary-button>

                <a href="{{ route('users.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    @endif
</x-app-layout>
