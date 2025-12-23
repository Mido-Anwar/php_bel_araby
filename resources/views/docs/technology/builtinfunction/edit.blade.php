<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Builtin Function'" />

    </x-slot>




    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="'Edit Builtin Function'" />
        </x-slot>

    </x-dashboard-container>
    <x-hidden-form :action-url="route('builtinfunction.update', $builtInFunction->id)" :open="false" :btnName="'Edit Builtin Function'" :formBtnName="'Update Builtin Function'">
        <div>
            <x-input-label for="name" :value="'Builtin Function Name'" />
            <input type="text" name="name" id="name" value="{{ $builtInFunction->name }}" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="tag_name" :value="'Tag Name'" />
            <input type="text" name="tag_name" id="tag_name" value="{{ $builtInFunction->tag_name }}" required autofocus>
            <x-input-error :messages="$errors->get('tag_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="syntax" :value="'Syntax'" />
            <textarea id="syntax" name="syntax" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ $builtInFunction->syntax }}</textarea>
            <x-input-error :messages="$errors->get('syntax')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ $builtInFunction->description }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="example" :value="'Example Code'" />
            <textarea id="example" name="example" rows="5"
                class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>{{ $builtInFunction->example }}</textarea>
            <x-input-error :messages="$errors->get('example')" class="mt-2" />
        </div>
        <input type="hidden" name="technology_id" value="{{ $builtInFunction->technology->id }}">

    </x-hidden-form>


</x-app-layout>