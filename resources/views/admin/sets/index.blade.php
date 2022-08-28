<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Set') }}
        </h2>
        <div
            class="flex items-center justify-end text-cyan-500 background-transparent font-bold uppercase px-8 py-3 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
            <x-nav-link :href="route('admin.sets.create')" :active="request()->routeIs('admin.sets.create')">
                {{ __('Add Set') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />

                    <livewire:admin-set-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
