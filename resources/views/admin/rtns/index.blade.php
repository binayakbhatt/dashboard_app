<x-app-layout>
    <x-slot name="header">
        <span class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('RTNs') }}
            </h2>
            <div
                class="flex items-center justify-end text-cyan-500 background-transparent font-bold uppercase outline-none focus:outline-none ease-linear transition-all duration-150">
                <x-nav-link :href="route('admin.rtns.create')">
                    {{ __('Add RTN') }}
                </x-nav-link>
            </div>
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />
                    <livewire:admin-rtn-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
