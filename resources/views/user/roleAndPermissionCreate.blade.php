<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
    </x-slot>




        @if (request()->routeIs('role.create'))
        <x-slot name="div">
            <x-dashboard-head :text="'Add Role'" />
        </x-slot>
        <x-hidden-form :action-url="route('role.store')" :open="false" :btnName="'Add Role'" :formBtnName="'Add Role'">

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

        </x-hidden-form>
        @elseif(request()->routeIs('permission.create'))
        <x-slot name="div">
            <x-dashboard-head :text="'Add Permission'" />
        </x-slot>
        <x-hidden-form :action-url="route('permission.store')" :open="false" :btnName="'Add Permission'" :formBtnName="'Add Permission'">

            <div>
                <x-input-label for="name" :value="'Permission Name'" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </x-hidden-form>
        @endif
</x-app-layout>