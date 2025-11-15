<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Edit User'" />
        <x-dashboard-paragraph :text="'Modify user information and roles.'" />
    </x-slot>



        <x-dashboard-container>
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <x-input-label for="role" :value="__('role')" />

                <select name="role" id="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update User') }}</x-primary-button>
                </div>

            </form>

        </x-dashboard-container>
   
</x-app-layout>
