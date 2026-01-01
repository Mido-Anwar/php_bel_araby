<div class="doc-view">
    <div class="sidebar">
        @foreach ($technology->sections as $section)
            <div class="sections">

                <button class="section-btn" data-target="sec-{{ $section->id }}">
                    {{ $section->title }}
                </button>

                @if ($section->concepts->count() > 0)
                    <ul class="section-body" id="sec-{{ $section->id }}">

                        @foreach ($section->concepts as $concept)
                            <li href="#">
                                {{ $concept->name }}
                            </li>
                        @endforeach

                    </ul>
                @endif

            </div>
        @endforeach

    </div>

    <div class="content">
        <h1>{{ $technology->name }}</h1>
        <p>{{ $technology->description }}</p>
    </div>
</div>
