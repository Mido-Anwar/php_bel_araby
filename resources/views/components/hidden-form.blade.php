@props(['actionUrl', 'fields' => [], 'btnName' => 'Open Form', 'formBtnName' => 'Submit'])
<div class="form-container">
    {{-- Form container --}}

    <form action="{{ $actionUrl }}" method="POST" class="" enctype="multipart/form-data">
        @csrf

        {{ $slot }}

        {{-- Submit --}}
        <button type="submit" class="btn-dashboard my-5">
            {{ $formBtnName ?? 'Submit' }}
        </button>
    </form>

</div>
