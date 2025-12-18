<x-master-layout>
    <div class="flex flex-col gap-4 bg-gray-200 p-4 rounded">
        <h1>{{$post->title}}</h1>
        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        <p>{{$post->content}}</p>
    </div>
</x-master-layout>