<x-master-layout>

    <aside class="learn-sidebar" id="accordion">
        <h3>Categories</h3>
        @for ($i = 0; $i < 25; $i++)
            <details class="aside-main-links">
                <summary class="">العنوان {{ $i }}</summary>
                <a href="">content</a>
            </details>
        @endfor
    </aside>

    <section class="content">
        <h1>Welcome to My Website</h1>
        <p>
            This is the main content area. You can write articles, show products,
            or display anything here.
        </p>
    </section>
</x-master-layout>
