<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit User'" />

    </x-slot>

    <x-slot name="div">
        <x-dashboard-head :text="'Edit User Details'" />
        <x-dashboard-paragraph :text="'Modify user information and roles.'" />
    </x-slot>
    <x-hidden-form :action-url="route('user.update', $user->id)" :open="false" :btnName="'Edit User'" :formBtnName="'Update User'">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <input type="text" name="name" id="name" value="{{ $user->name }}" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <x-input-label for="role" :value="__('role')" />

        <select name="role" id="role">
            @foreach ($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
            @endforeach
        </select>
    
    </x-hidden-form>

</x-app-layout>