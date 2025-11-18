<div class="dashboard-container">
    <!-- Page Heading -->
    @isset($div)
        <div class="bg-white dark:bg-gray-800  slot-container">

            {{ $div }}

        </div>
    @endisset
    <div style="display:inline-block;" class="mx-3">
        {{ $slot }}

    </div>
</div>
