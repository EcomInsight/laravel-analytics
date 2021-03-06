<div class="flex-1 flex flex-col overflow-hidden">
    <header class="w-full">
        <div class="relative z-10 flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm flex">
            <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-2 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            @yield('filter')
            {{--<div class="flex-1 flex justify-between px-4 sm:px-6">
                <div class="flex-1 flex">
                    <form class="w-full flex md:ml-0" action="#" method="GET">
                        <label for="search-field" class="sr-only">Search all files</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                <!-- Heroicon name: solid/search -->
                                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input name="search-field" id="search-field" class="h-full w-full border-transparent py-2 pl-8 pr-3 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400" placeholder="Search" type="search">
                        </div>
                    </form>
                </div>
            </div>--}}
        </div>
    </header>

    <!-- Main content -->
    <div class="flex-1 flex items-stretch overflow-hidden">
        <main class="flex-1 overflow-y-auto">
            <!-- Primary column -->
            <section aria-labelledby="primary-heading" class="min-w-0 flex-1 h-full flex flex-col lg:order-last">
                <h1 id="primary-heading" class="sr-only">Photos</h1>
                @yield('content')
            </section>
        </main>

        <!-- Secondary column (hidden on smaller screens) -->
        <aside class="hidden w-96 bg-white border-l border-gray-200 overflow-y-auto lg:block">
            @yield('secondary-content')
        </aside>
    </div>
</div>
