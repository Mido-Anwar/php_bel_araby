<x-master-layout>

    <aside class="learn-sidebar" id="accordion">
        <h3>Categories</h3>
    </aside>

    <section class="content">
        <h1>Welcome to My Website</h1>
        <p>
            @foreach ($techs as $tech)
                <h2 style="
color: #1e293b;
font-size: 20px;
font-weight: bolder;
">{{ $tech->name }}</h2>

                @foreach ($tech->sections as $section)
                    <h4 style="color: #055dea;
font-size: 15px;
font-weight: bolder;">{{ $section->title }}</h4>

                    <ul>
                        @foreach ($section->concepts as $concept)
                            <li style="color: #d17818;
font-size: 10px;
font-weight: bolder;">{{ $concept->name }}</li>
                        @endforeach

                        @foreach ($section->builtinFunctions as $fn)
                            <li style="color: #0ebf20;
font-size: 10px;
font-weight: bolder;">{{ $fn->name }}</li>
                        @endforeach
                    </ul>
                @endforeach
            @endforeach

        </p>
    </section>
</x-master-layout>
