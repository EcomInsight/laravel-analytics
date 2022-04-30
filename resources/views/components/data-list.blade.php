<li>
    <a href="#" class="block hover:bg-gray-50">
        <div class="flex justify-between items-center px-4 py-4 sm:px-6">
            <div>
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex px-4 pb-4">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 truncate" x-text="page.domain + page.url"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-gray-900 px-4">
                        Last seen on
                        <time datetime="2020-01-07" x-text="page.max_updated_at"></time>
                    </p>
                </div>
            </div>
            <div>
                <!-- Heroicon name: solid/chevron-right -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </a>
</li>
