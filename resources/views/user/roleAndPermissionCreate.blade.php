<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Role & Permission Management'" />
        <x-dashboard-paragraph :text="'Create Role & Permission'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>

            @if (request()->routeIs('role.create'))
                <x-dashboard-head :text="'Add role'" />

                <x-hidden-form :action-url="route('role.store')" method="POST" :fields="[
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
                        ],]" >

                </x-hidden-form>
            @elseif(request()->routeIs('permission.create'))
                <x-dashboard-head :text="'Add permission'" />

                <x-hidden-form :action-url="route('permission.store')" method="POST" :fields="[
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
                        ],]">

                </x-hidden-form>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
