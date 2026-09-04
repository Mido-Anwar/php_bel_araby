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
                            <li  class="concept-btn" data-concept-id="{{ $concept->id }}"
                                data-title="{{ $concept->title }}" data-description="{{ $concept->description }}">
                                {{ $concept->title }}
                            </li>
                        @endforeach

                    </ul>
                @endif

            </div>
        @endforeach

    </div>

    <div class="content">
        <h1>{{ $technology->name}}</h1>
        <div id="tech-description">
            <p>{{ $technology->description }}</p>
        </div>
        <div id="concept-content" style="display:none;">
            <h2 id="concept-title"></h2>
            <p id="concept-description"></p>
        </div>
    </div>
</div>

<script>
 // JavaScript to handle concept button clicks and toggle content display
    document.addEventListener('DOMContentLoaded', function() {
        const conceptButtons = document.querySelectorAll('.concept-btn');
        const techDescription = document.getElementById('tech-description');
        const conceptContent = document.getElementById('concept-content');
        const conceptTitle = document.getElementById('concept-title');
        const conceptDescription = document.getElementById('concept-description');

        let currentConceptId = null;

        conceptButtons.forEach(button => {
            button.addEventListener('click', function() {
                const conceptId = this.getAttribute('data-concept-id');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');

                if (currentConceptId === conceptId) {
                    // Hide concept content and show tech description
                    conceptContent.style.display = 'none';
                    techDescription.style.display = 'block';
                    currentConceptId = null;
                } else {
                    // Show concept content
                    conceptTitle.textContent = title;
                    conceptDescription.textContent = description;

                    techDescription.style.display = 'none';
                    conceptContent.style.display = 'block';
                    currentConceptId = conceptId;
                }
            });
        });
    });
</script>
