<div class="dashboard-container">
    <!-- Page Heading -->
    @isset($div)
        <div class="bg-white dark:bg-gray-800  slot-container">

            {{ $div }}

        </div>
    @endisset
 <main class="w-full  flex flex-col md:flex-row items-center justify-center gap-4 px-4 sm:px-8 md:px-6 lg:px-12 xl:px-20 text-center">
    {{ $slot }}
</main>

</div>
