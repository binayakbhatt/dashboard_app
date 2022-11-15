<x-app-layout>
    <x-slot name="header">
        <span class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Rankings') }}
            </h2>
        </span>
    </x-slot>

    @foreach ($mailServices as $mailService)
        @php
            $hasRanking = $mailService->ranking()->exists();
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 shadow-lg">
                        <h2 class="font-serif text-4xl pb-8 font-normal">{{ $mailService->name }}</h2>

                        {{-- Form to update service ranking --}}
                        <form action="{{ route('rankings.update', $mailService->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- First place and first place image --}}
                            <input type="hidden" name="service" value="{{ $mailService->id }}">
                            <div class="grid md:grid-cols-3 gap-6 gap-y-6">
                                <div class="flex flex-col">
                                    <label for="first_place" class="text-gray-700">First Place</label>
                                    <input type="text" name="first_place" id="first_place"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('first_place') border-red-500 @enderror"
                                        value="{{ $hasRanking ? $mailService->ranking->first_place : old('first_place') }}">
                                    @error('first_place')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="first_place_image" class="text-gray-700">First Place Image</label>
                                    <input type="file" name="first_place_image" id="first_place_image"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('first_place_image') border-red-500 @enderror"
                                        value="">
                                    @error('first_place_image')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="first_place_image" class="text-gray-700">First Place Image</label>
                                    <img alt="First Place Image" class="w-32 h-32"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $mailService->ranking->image_path_first) : '' }}">
                                </div>
                            </div>

                            {{-- Second place and second place image --}}
                            <div class="grid md:grid-cols-3 gap-6 gap-y-6">
                                <div class="flex flex-col">
                                    <label for="second_place" class="text-gray-700">Second Place</label>
                                    <input type="text" name="second_place" id="second_place"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('second_place') border-red-500 @enderror"
                                        value="{{ $hasRanking ? $mailService->ranking->second_place : old('second_place') }}">
                                    @error('second_place')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="second_place_image" class="text-gray-700">Second Place Image</label>
                                    <input type="file" name="second_place_image" id="second_place_image"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('second_place_image') border-red-500 @enderror"
                                        value="">
                                    @error('second_place_image')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="second_place_image" class="text-gray-700">Second Place Image</label>
                                    <img alt="Second Place Image" class="w-32 h-32"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $mailService->ranking->image_path_second) : '' }}">
                                </div>
                            </div>

                            {{-- Third place and third place image --}}
                            <div class="grid md:grid-cols-3 gap-6 gap-y-6">
                                <div class="flex flex-col">
                                    <label for="third_place" class="text-gray-700">Third Place</label>
                                    <input type="text" name="third_place" id="third_place"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('third_place') border-red-500 @enderror"
                                        value="{{ $hasRanking ? $mailService->ranking->third_place : old('third_place') }}">
                                    @error('third_place')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="third_place_image" class="text-gray-700">Third Place Image</label>
                                    <input type="file" name="third_place_image" id="third_place_image"
                                        class="border-2 border-gray-300 p-2 rounded-lg @error('third_place_image') border-red-500 @enderror"
                                        value="">
                                    @error('third_place_image')
                                        @if (old('service') == $mailService->id)
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label for="third_place_image" class="text-gray-700">Third Place Image</label>
                                    <img alt="Third Place Image" class="w-32 h-32"
                                        src="{{ $hasRanking ? url('storage/uploads/' . $mailService->ranking->image_path_third) : '' }}">
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </form>
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
