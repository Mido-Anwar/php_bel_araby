<x-master-layout>

    <aside class="learn-sidebar" id="accordion">


    @foreach ($technology->sections as $section)
        <h4>{{ $section->title }}</h4>

        <ul>
            @foreach ($section->concepts as $concept)
                <li>{{ $concept->name }}</li>
            @endforeach

            @foreach ($section->builtinFunctions as $fn)
                <li>{{ $fn->name }}</li>
            @endforeach
        </ul>
    @endforeach
    </aside>

    <section class="content">
    <h1>{{ $technology->name }}</h1>
    <p>
        {{ $technology->description ?? 'No description available.'   }}
    </p>

    </section>
</x-master-layout>
