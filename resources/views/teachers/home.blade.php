<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('teachers.show')" :active="request()->routeIs('teachers.*')">
                    {{ __('المدرسين') }}
                </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Welcome in Teachers Page
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
