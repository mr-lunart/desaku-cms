<nav class="bg-gray-800 relative top-0">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="<?= route('pusatdata') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Perangkat RT</a>
                        <a href="<?= route('visibaru') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Visi Misi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="<?= route('pusatdata') ?>" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Perangkat RT</a>
            <a href="<?= route('visibaru') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Visi Misi</a>
        </div>
    </div>
</nav>