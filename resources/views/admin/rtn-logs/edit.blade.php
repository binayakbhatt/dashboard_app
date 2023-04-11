<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update RTN Log') }}
        </h2>
    </x-slot>

    @livewire('edit-rtn-log', ['rtnLog' => $rtnLog])

</x-app-layout>
