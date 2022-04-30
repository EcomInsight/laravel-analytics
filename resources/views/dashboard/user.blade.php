@extends('analytics::layouts.app')

@section('filter')

@endsection

@section('content')
    <x-analytics::data-table
        label="Users"
        description="Dit is een overzicht van alle pageviews van users"
        :table="$userTable"
    />
@endsection

@section('secondary-content')
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200" x-data="{ users: {{ $lastSeenUsers }} }">
            <template x-for="user in users">
                <li>
                    <a href="#" class="block hover:bg-gray-50">
                        <div class="flex justify-between items-center px-4 py-4 sm:px-6">
                            <div>
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="min-w-0 flex px-4 pb-4">
                                        <div>
                                            <p class="text-sm font-medium text-black truncate" x-text="user.user.name"></p>
                                        </div>
                                        <svg x-show="user.online" xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                        <svg x-show="!user.online" xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p x-show="user.online" class="text-sm text-gray-900 px-4">
                                        Online now
                                    </p>
                                    <p x-show="!user.online" class="text-sm text-gray-900 px-4">
                                        Last seen on
                                        <span x-text="user.max_updated_at"></span>
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
            </template>
        </ul>
    </div>
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush
