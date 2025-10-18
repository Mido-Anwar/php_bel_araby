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
                        'name' => 'user_id',
                        'type' => 'hidden',
                        'label' => '',
                        'placeholder' => 'Enter Post title',
                        'value' => auth()->user()->id,
                    ],
                    [
                        'name' => 'title',
                        'type' => 'text',
                        'label' => 'Post Title',
                        'placeholder' => 'Enter Post title',
                        'value' => $post->title,
                    ],
                ]">

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
                        'name' => 'title',
                        'type' => 'text',
                        'label' => 'Post Title',
                        'placeholder' => 'Enter Post title',
                        'value' => $post->title,
                    ],
                ]">
                </x-hidden-form>
            @endif
        </x-dashboard-container>
    </div>

</x-app-layout>
