<div class="dashboard-container">
    <!-- Page Heading -->
    @isset($div)
        <div class="bg-white dark:bg-gray-800  slot-container">

            {{ $div }}

        </div>
    @endisset
    <div>
    {{ $slot }}

    </div>
</div>
