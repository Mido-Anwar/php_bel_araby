<div class="doc-view">

    <div class="content">
        <h1>PHP</h1>
        <p>{{ $technology->description }}</p>
    </div>

    <div class="sidebar">

        @foreach ($technology->sections as $section)
            <div class="section">

                <button class="section-btn" data-target="sec-{{ $section->id }}">
                    {{ $section->title }}
                </button>

                @if ($section->concepts->count() > 0)
                    <div class="section-body" id="sec-{{ $section->id }}">

                        @foreach ($section->concepts as $concept)
                            <a href="#">
                                {{ $concept->name }}
                            </a>
                        @endforeach

                    </div>
                @endif

            </div>
        @endforeach

    </div>
</div>
