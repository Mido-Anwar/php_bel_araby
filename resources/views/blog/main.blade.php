<x-master-layout>
    <div class="blog-content">
        @foreach ($posts as $post )

            <div class="article-card">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
</x-master-layout>

