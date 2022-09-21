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
                    <p class="text-justify mt-3 indent-5"> Welcome to Monitoring Dashboard of Assam. At present
                        monitoring of all
                        Mail office under RMS Gh Division can be done effectively through the dashboard. Click on the
                        Mail office link at the upper left corner to open the Mail office dashboard. If the link is not
                        visible then your account is yet to be approved by the Administrator. In such case contact your
                        administrator or drop a request in the mail monitoring whatsapp group. </p>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->hasRole(['Guest']))
        <x-confirm-modal>
            Your Profile has not been verified yet. You will be able to access the functionalities after your profile is
            verified.
        </x-confirm-modal>
    @endif
</x-app-layout>
