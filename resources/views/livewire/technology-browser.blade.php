<div class="flex gap-6">
    <!-- Sidebar -->
    <aside class="w-1/4 border-r pr-4">
        <h3 class="font-bold mb-2">Categories</h3>
        <ul>
                <li>
                    <button wire:click="selectTech({{ $tecnology->id }})"
                        class="text-blue-600 hover:underline">
                        {{ $technology->name }}assssssssss
                    </button>
                </li>

        </ul>
    </aside>

    <!-- Content -->
    <section class="w-3/4">
        @if ($selectedTech)
            <h2 class="text-xl font-bold text-gray-800">{{ $selectedTech->name }}</h2>

            @foreach ($selectedTech->sections as $section)
                <h4 class="text-lg font-semibold text-blue-700">{{ $section->title }}</h4>
                <ul class="ml-4 list-disc">
                    @foreach ($section->concepts as $concept)
                        <li class="text-orange-600 text-sm">{{ $concept->name }}</li>
                    @endforeach

                    @foreach ($section->builtinFunctions as $fn)
                        <li class="text-green-600 text-sm">{{ $fn->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        @else

        @endif
    </section>
</div>

