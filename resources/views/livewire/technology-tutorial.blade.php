<div class="w3-container">

    <!-- Sidebar -->
    <aside class="w3-sidebar">
        <h3 style="padding:16px">{{ $technology->name }} Tutorial</h3>

        @foreach ($technology->sections as $section)
        <a href="#" wire:click.prevent="selectItem('section', {{ $section->id }})">{{ $section->title }}</a>

            @foreach ($section->concepts as $concept)
                <a href="#" wire:click.prevent="selectItem('concept', {{ $concept->id }})">
                    {{ $concept->name }}
                </a>
            @endforeach

            @foreach ($section->builtinFunctions as $fn)
                <a href="#" wire:click.prevent="selectItem('function', {{ $fn->id }})">
                    {{ $fn->name }} <small>(Function)</small>
                </a>
            @endforeach
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
                <h1>{{ $current->name }}</h1>
                <p>{{ $current->content }}</p>
                @if($current->description)
                    <p>{{ $current->description }}</p>
                @endif
                @if($current->syntax)
                    <div class="w3-panel w3-light-grey">
                        <h4>Syntax</h4>
                        <pre>{{ $current->syntax }}</pre>
                    </div>
                @endif
                @if($current->example)
                    <div class="w3-panel w3-border">
                        <h4>Example</h4>
                        <pre>{{ $current->example }}</pre>
                    </div>
                @endif
            </div>
        @endif

    </main>
</div>
