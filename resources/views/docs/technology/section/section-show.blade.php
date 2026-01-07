<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="$section->title" />
        <x-message :message="session('success-store-concept')" :color="'green'" />
        <x-message :message="session('success-update-concept')" :color="'blue'" />
        <x-message :message="session('success-delete-concept')" :color="'red'" />
        {{-- Success update Message --}}
        <x-message :message="session('success-update-section')" color="blue" />
    </x-slot>


    <x-dashboard-container>

        {{-- Section Card --}}

        <x-slot name="div">
            <x-dashboard-head :text="$section->title" />
            <a href="{{ route('section.edit', $section->id) }}" class="btn-edit">
                ✎ Edit Section
            </a>
            <x-dashboard-paragraph :text="$section->content" />
        </x-slot>
    </x-dashboard-container>


    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Concepts'" />
            <a href="{{ route('concept.create', $section->id) }}" class="btn-create">
                ✎ Add Concept to Section
            </a>

        </x-slot>

    </x-dashboard-container>
    <x-dashboard-container>
        @if($section->concepts->isEmpty())
        <x-slot name="div">
            <x-dashboard-paragraph :text="'No Concepts in this section'" />
        </x-slot>
        @else
        <x-slot name="div">
            <x-dashboard-paragraph :text="'Concepts in this section'" />
        </x-slot>
        @foreach($section->concepts as $concept)
        <div class="btn-container">
            <a href="{{ route('concept.show', $concept->id) }}" class="btn-show">{{ $concept->title }}</a> <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">
                ✎ Edit
            </a>
            <form action="{{ route('concept.destroy', $concept->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">X</button>
            </form>
        </div>
        @endforeach
        @endif
    </x-dashboard-container>
</x-app-layout>