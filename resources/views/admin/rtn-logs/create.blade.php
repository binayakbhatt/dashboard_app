<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add RTN Log') }}
        </h2>
    </x-slot>

    @livewire('add-rtn-log')

</x-app-layout>
