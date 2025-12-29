<x-master-layout>

    {{-- <div class="p-2 bg-slate-300 min-h-screen  ">
        @foreach ($technology->sections as $section)
            <div x-data="{ open: false }" class="border">

                <button @click="open = ! open">{{ $section->title }}</button>
                <div x-show="open">
                    <div> overview of {{ $section->title }}</div>
                    @foreach ($section->concepts as $concept)
                        <button class=" flex p-2 border bg-red-200">{{ $concept->name }}</button>
                    @endforeach
                </div>
            </div>
        @endforeach</div> --}}
         <x-master.doc-view :technology="$technology" /> 

</x-master-layout>
