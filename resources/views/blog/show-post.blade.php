<x-master-layout>
    <div class="article">
        <h1 dir="{{ textDir($post->title) }}"style="align-self: {{ textDir($post->title) == 'rtl' ? 'flex-start' : 'flex-end' }};">{{$post->title}}</h1>
        <img style="width:500px; height: 500px; object-fit: cover;" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        <p dir="{{ textDir($post->content) }}">{{$post->content}}</p>
    </div>
</x-master-layout>