<app-layout :title="$title">
    <x-slot name="header">
        <x-dashboard-head :text="$post->title" />
    </x-slot>

    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="$post->title" />
            <x-dashboard-paragraph :text="$post->content" />
        </x-slot>
    </x-dashboard-container>
