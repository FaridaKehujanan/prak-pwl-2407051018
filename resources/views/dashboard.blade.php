<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    @role('dosen')
                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('user-management.index') }}"
                                class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 flex items-center gap-2">
                                👥 <span>User Management</span>
                            </a>
                        </div>
                    @endrole

                </div>
            </div>
        </div>
    </div>
</x-app-layout>