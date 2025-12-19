<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
    </x-slot>



    @if (isset($role) && request()->routeIs('role.edit', $role->id))
    <x-slot name="div">
        <x-dashboard-head :text="'Edit role'" />
    </x-slot>
    <x-hidden-form :action-url="route('role.update', $role->id)" :open="false" :btnName="'Edit Role'" :formBtnName="'Update Role'">

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

    </x-hidden-form>
    @elseif (isset($permission) && request()->routeIs('permission.edit', $permission->id))
    <x-slot name="div">
        <x-dashboard-head :text="'Edit permission'" />
    </x-slot>
    <x-hidden-form :action-url="route('permission.update', $permission->id)" :open="false" :btnName="'Edit Permission'" :formBtnName="'Update Permission'">

        <div>
            <x-input-label for="name" :value="'Permission Name'" />
            <input type="text" name="name" id="name" value="{{ $permission->name }}" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </x-hidden-form>
    @endif



</x-app-layout>