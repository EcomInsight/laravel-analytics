<div x-data="table()" class="p-4 sm:p-6 lg:p-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ $label }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <template x-for="header in headers">
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 capitalize">
                                    <div class="flex">
                                        <a
                                            x-on:click.prevent="headerClick(header)"
                                            href="#"
                                            class="group inline-flex">
                                            <span x-text="header[0].toUpperCase() + header.slice(1).toLowerCase().replaceAll('_', ' ')"></span>
                                            <span
                                                x-show="sortParameterValue(header) === 'asc'"
                                                class="ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300"
                                            >
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                            <span
                                                x-show="sortParameterValue(header) === 'desc'"
                                                class="ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">>
                                                <path fill-rule="evenodd"
                                                      d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                        </a>
                                    </div>
                                </th>
                            </template>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <template x-for="row in table">
                            <tr>
                                <template x-for="field in row">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"
                                        x-text="field"></td>
                                </template>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-3 flex items-center justify-between border-t border-gray-200 sm:px-2">
        <div class="flex-1 flex justify-between sm:hidden">
            <a x-bind:href="paginate.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
            <a x-bind:href="paginate.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span x-text="paginate.from" class="font-medium"></span>
                    to
                    <span x-text="paginate.to" class="font-medium"></span>
                    of
                    <span x-text="paginate.total" class="font-medium"></span>
                    results
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <template x-for="link in paginate.links">
                        <a
                            x-bind:href="link.url"
                            x-html="link.label"
                            aria-current="page"
                            :class="link.active ? 'bg-indigo-50 border-indigo-500 text-indigo-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'"
                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"></a>
                    </template>
                </nav>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function table() {
            return {
                paginate: {
                    current_page: @json($table['current_page']),
                    first_page_url: @json($table['first_page_url']),
                    from: @json($table['from']),
                    last_page: @json($table['last_page']),
                    last_page_url: @json($table['last_page_url']),
                    links: @json($table['links']),
                    next_page_url: @json($table['next_page_url']),
                    per_page: @json($table['per_page']),
                    prev_page_url: @json($table['prev_page_url']),
                    to: @json($table['to']),
                    total: @json($table['total']),
                },
                table: @json($table['data']),
                headers: Object.keys(@json($table['data'][0])),
                parameters: [],
                init() {
                    const urlParams = new URLSearchParams(window.location.search);
                    for (const [i, v] of urlParams.entries()) {
                        this.parameters.push({header: i.slice(6, -1), value: v});
                    }
                },
                headerClick(header) {
                    const urlParams = new URLSearchParams(window.location.search);

                    let sortParam = 'sorts[' + header + ']';

                    if (!urlParams.get(sortParam)) {
                        urlParams.set(sortParam, 'asc');
                    } else if (urlParams.get(sortParam) === 'asc') {
                        urlParams.set(sortParam, 'desc');
                    } else {
                        urlParams.delete(sortParam)
                    }
                    window.location.search = urlParams;
                },
                sortParameterValue(header) {
                    let temp = this.parameters.find(obj => {
                        return obj.header === header
                    });
                    return temp ? temp.value : null;
                }
            }
        }
    </script>
@endpush
