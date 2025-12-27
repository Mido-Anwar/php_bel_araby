<div class="w3-container">

    <!-- Sidebar -->
    <aside class="w3-sidebar">
        <h3 style="padding:16px">{{ $technology->name }} Tutorial</h3>

        @foreach ($technology->sections as $section)
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w3-button w3-block w3-left-align" wire:click.prevent="selectItem('section', {{ $section->id }})">
                {{ $section->title }} <i class="fa fa-caret-down"></i>
            </button>

            <div x-show="open" x-collapse class="w3-hide w3-white w3-card-4" :class="{'w3-show': open, 'w3-hide': !open}">
                @foreach ($section->concepts as $concept)
                <a href="#" class="w3-bar-item w3-button" wire:click.prevent="selectItem('concept', {{ $concept->id }})">
                    {{ $concept->name }}
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
    </aside>

    <!-- Main Content -->
    <main class="w3-content">

        @if(!$current)
        <div>
            <h1>{{ $technology->name }}</h1>
            <p>{{ $technology->description ?? 'No description available.' }}</p>
            <hr>
            <p>Select a topic from the menu to learn.</p>
        </div>
        @else
        <div>
            <h1 class="w3-text-blue">{{ $current->title ?? $current->name }}</h1>

            @if(isset($current->content))
            <div class="w3-panel">
                {!! $current->content !!}
            </div>
            @endif

            @if(isset($current->description))
            <p class="w3-text-gray">{{ $current->description }}</p>
            @endif
            @if($current->syntax)
            <div class="w3-panel w3-light-grey">
                <h4>Syntax</h4>
                <pre>{{ $current->syntax }}</pre>
            </div>
            @endif
            @if($current->example)
            <div class="w3-panel w3-border w3-light-grey">
                <h4>Example</h4>
                <pre>{{ $current->example }}</pre>
            </div>
            @endif
        </div>
        @endif

    </main>
</div>