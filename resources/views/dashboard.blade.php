<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-lg">
                    <h2 class="text-rose-700 font-serif text-4xl font-normal text-center">
                        Monitoring Dashboard of Assam Circle</h2>
                    <p class="text-center mt-3"> This website serves as an entry point for monitoring the projects of
                        Assam Circle </p>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->hasRole(['Guest']))
        <x-confirm-modal>
            Your Profile has not been verified yet. You will be able to access the functionalities after your profile is verified.
        </x-confirm-modal>
    @endif
</x-app-layout>
