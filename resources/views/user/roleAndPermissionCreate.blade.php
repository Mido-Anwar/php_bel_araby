<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
    </x-slot>




    @if (request()->routeIs('role.create'))
        <x-slot name="div">
            <x-dashboard-head :text="'Add Role'" />
        </x-slot>
        <form action="{{ route('role.store') }}" method="POST" class="form-style">
            @csrf
            <div>
                <x-input-label for="name" :value="'Role Name'" />
                <input type="text" name="name" id="name" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <h3> give role a permission</h3>
            @foreach ($permissions as $permission)
                <div class="my-4 inline-flex gap-2 ">
                    <label class="ml-2 text-gray-700" for="{{ $permission->name }}">{{ $permission->name }}</label>

                    <input type="checkbox" name="permissions[]" id="{{ $permission->name }}"
                        value="{{ $permission->name }}">
                </div>
            @endforeach
            <div>
                <x-primary-button class="mt-4">
                    {{ __('Create Permission') }}
                </x-primary-button>

                <a href="{{ route('users.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    @elseif(request()->routeIs('permission.create'))
        <x-slot name="div">
            <x-dashboard-head :text="'Add Permission'" />
        </x-slot>
        <form action="{{ route('permission.store') }}" method="POST" class="form-style">
            @csrf
            <div>
                <x-input-label for="name" :value="'Permission Name'" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div>
                <x-primary-button class="mt-4">
                    {{ __('Create Permission') }}
                </x-primary-button>

                <a href="{{ route('users.index') }}" class="btn-cancel">Cancel</a>
            </div>


        </form>
    @endif
</x-app-layout>
