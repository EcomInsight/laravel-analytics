<div class="hidden w-28 bg-indigo-700 overflow-y-auto md:block min-h-screen">
    <div class="w-full py-6 flex flex-col items-center">
        <div class="flex-shrink-0 flex items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="Workflow">
        </div>
        <div class="flex-1 mt-6 w-full px-2 space-y-1">
            <a href="{{ route('admin.analytics.dashboards.index') }}"
               :class="{{ request()->routeIs('admin.analytics.dashboards.index') }} ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white '"
               class="group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                <svg :class="{{ request()->routeIs('admin.analytics.dashboards.index') }} ? 'text-white' : 'text-indigo-300 group-hover:text-white'"
                    class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="mt-2">Home</span>
            </a>
            <a href="{{ route('admin.analytics.dashboards.events') }}"
               :class="{{ request()->routeIs('admin.analytics.dashboards.events') }} ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white '"
               class="group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                <svg :class="{{ request()->routeIs('admin.analytics.dashboards.events') }} ? 'text-white' : 'text-indigo-300 group-hover:text-white'"
                     class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="mt-2">Events</span>
            </a>
            <a href="{{ route('admin.analytics.dashboards.users') }}"
               :class="{{ request()->routeIs('admin.analytics.dashboards.users') }} ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white '"
               class="group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                <svg :class="{{ request()->routeIs('admin.analytics.dashboards.users') }} ? 'text-white' : 'text-indigo-300 group-hover:text-white'"
                     class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="mt-2">Users</span>
            </a>
            <a href="{{ route('admin.analytics.dashboards.pages') }}"
               :class="{{ request()->routeIs('admin.analytics.dashboards.pages') }} ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white '"
               class="group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                <svg :class="{{ request()->routeIs('admin.analytics.dashboards.pages') }} ? 'text-white' : 'text-indigo-300 group-hover:text-white'"
                     class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="mt-2">Pages</span>
            </a>
            <a href="{{ route('admin.analytics.dashboards.utmLinks') }}"
               :class="{{ request()->routeIs('admin.analytics.dashboards.utmLinks') }} ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white '"
               class="group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                <svg :class="{{ request()->routeIs('admin.analytics.dashboards.utmLinks') }} ? 'text-white' : 'text-indigo-300 group-hover:text-white'"
                     class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="mt-2">UTM</span>
            </a>
        </div>
    </div>
</div>
