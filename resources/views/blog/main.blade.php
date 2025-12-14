<x-master-layout>
    <div class="blog-content">
        @foreach ($posts as $post )

            <div class="article-card">
                    <img style="width: 200px; height: 200px; object-fit: cover;" src="{{ asset('storage/' . $post->image) }}" alt="">
                <h3>{{ $post->title }}</h3>
             
            </div>
        @endforeach
    </div>
</x-master-layout>

