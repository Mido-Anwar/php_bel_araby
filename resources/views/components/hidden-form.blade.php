@props(['actionUrl', 'open' => false, 'fields' => [], 'btnName' => 'Open Form', 'formBtnName' => 'Submit'])
<div class="form-container" x-data="{ open: @json($open) }">
    {{-- Toggle button --}}
    <button type="button" @click="open = ! open" class="btn-dashboard" style="align-self: start;">
        <span x-show="!open">{{ $btnName ?? 'Open Form ' }}</span>
        <span x-show="open">Close Form</span>
    </button>

    {{-- Form container --}}
    <div x-show="open" x-transition class="w-full p-1  flex justify-center mt-4">
        <form action="{{ $actionUrl }}" method="POST" class="w-full p-3 space-y-5" enctype="multipart/form-data" >
            @csrf

            {{ $slot }}


            {{-- Submit --}}
            <button type="submit" class="btn-dashboard my-5">
               {{$formBtnName ?? 'Submit'}}
            </button>        
        </form>
    </div>
</div>
