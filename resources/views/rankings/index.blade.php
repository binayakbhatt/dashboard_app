<x-app-layout>
    <x-slot name="header">
        <span class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Rankings') }}
            </h2>

            <div
                class="flex items-center justify-end text-cyan-500 background-transparent font-bold uppercase outline-none focus:outline-none ease-linear transition-all duration-150">
                <x-nav-link :href="route('rankings.create')">
                    {{ __('Update Rankings') }}
                </x-nav-link>
            </div>
        </span>
    </x-slot>

    @foreach ($mailServices as $service)
        @php
            $hasRanking = $service->ranking()->exists();
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 shadow-lg">
                        <h2 class="font-serif text-4xl pb-8 font-normal">{{ $service->name }}
                            {{-- Previous Month and year from current date --}}
                            <span class="text-gray-500 text-lg">
                                @php
                                    $current_date = Carbon\Carbon::now();
                                    $previous_month = $current_date->subMonth()->format('F Y');
                                @endphp
                                {{ $previous_month }}
                            </span>
                        </h2>
                        {{-- First --}}
                        <div class="grid md:grid-cols-3 gap-6 gap-y-6">
                            <x-image-card>
                                <x-slot name="image">
                                    <img class="rounded-t-lg w-full h-52 object-cover"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $service->ranking->image_path_first) : '' }}"
                                        alt="" />
                                </x-slot>
                                <x-slot name="title">
                                    First Place
                                </x-slot>
                                <x-slot name="description">
                                    {{ $hasRanking ? $service->ranking->first_place : '' }}
                                </x-slot>
                            </x-image-card>

                            <x-image-card>
                                <x-slot name="image">
                                    <img class="rounded-t-lg w-full h-52 object-cover"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $service->ranking->image_path_second) : '' }}"
                                        alt="" />
                                </x-slot>
                                <x-slot name="title">
                                    Second Place
                                </x-slot>
                                <x-slot name="description">
                                    {{ $hasRanking ? $service->ranking->second_place : '' }}
                                </x-slot>
                            </x-image-card>

                            <x-image-card>
                                <x-slot name="image">
                                    <img class="rounded-t-lg w-full h-52 object-cover"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $service->ranking->image_path_third) : '' }}"
                                        alt="" />
                                </x-slot>
                                <x-slot name="title">
                                    Third Place
                                </x-slot>
                                <x-slot name="description">
                                    {{ $hasRanking ? $service->ranking->third_place : '' }}
                                </x-slot>
                            </x-image-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (Auth::user()->hasRole(['Guest']))
        <x-confirm-modal>
            Your Profile has not been verified yet. You will be able to access the functionalities after your profile is
            verified.
        </x-confirm-modal>
    @endif
</x-app-layout>
