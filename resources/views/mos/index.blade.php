<x-app-layout>
    <x-slot name="header">
        <span class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mail Offices') }}
            </h2>
            @can('create', App\Models\Mo::class)
                <div
                    class="flex items-center justify-end text-cyan-500 background-transparent font-bold uppercase outline-none focus:outline-none ease-linear transition-all duration-150">
                    <x-button-link :href="route('mos.create')">
                        {{ __('Add Data') }}
                    </x-button-link>
                </div>
            @endcan
        </span>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />
                    <livewire:mo-table />
                </div>
            </div>
        </div>
    </div>
    <style>
        #input_date_formatted{
            min-width: 7rem !important;
        }
    </style>
</x-app-layout>
