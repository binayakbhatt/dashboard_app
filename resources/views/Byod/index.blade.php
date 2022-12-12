<x-app-layout>
    <x-slot name="header">
        <span class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('B.Y.O.D data') }}
            </h2>
            @can('create', App\Models\Byod::class)
                <div
                    class="flex items-center justify-end text-cyan-500 background-transparent font-bold uppercase outline-none focus:outline-none ease-linear transition-all duration-150">
                    <x-nav-link :href="route('byods.create')">
                        {{ __('Add Data') }}
                    </x-nav-link>
                </div>
            @endcan
        </span>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />
                    <livewire:byod-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
