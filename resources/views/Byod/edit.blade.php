<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('byods.update', $byod) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            {{-- name --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    value="{{ $byod->name }}" required autofocus />
                            </div>
                            {{-- Employee --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="employee_id" :value="__('Employee ID')" />
                                <x-input id="employee_id" class="block mt-1 w-full" type="text" name="employee_id"
                                    value="{{ $byod->employee_id }}" required autofocus />
                            </div>
                            {{-- Email --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="email"
                                    value="{{ $byod->email }}" required autofocus />
                            </div>
                            {{-- Mobile --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="mobile" :value="__('Mobile No')" />
                                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                                    value="{{ $byod->mobile }}" required autofocus />
                            </div>
                            {{-- Make & Model --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="make_model" :value="__('Make & Model')" />
                                <x-input id="make_model" class="block mt-1 w-full" type="text" name="make_model"
                                    value="{{ $byod->make_model }}" required autofocus />
                            </div>
                            {{-- IMEI --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="imei" :value="__('IMEI')" />
                                <x-input id="imei" class="block mt-1 w-full" type="text" name="imei"
                                    value="{{ $byod->imei }}" required autofocus />
                            </div>
                            {{-- Post Office --}}
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="post_office" :value="__('Post Office')" />
                                <x-input id="post_office" class="block mt-1 w-full" type="text" name="post_office"
                                    value="{{ $byod->post_office }}" required autofocus />
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:col-span-3">
                                {{-- Date of purchase --}}
                                <div class="mt-4 col-span-2 md:col-span-1">
                                    <x-label for="date_of_purchase" :value="__('Date of Purchase')" />
                                    <x-input id="date_of_purchase" class="block mt-1 w-full" type="date"
                                        name="date_of_purchase" value="{{ $byod->date_of_purchase->format('Y-m-d') }}" required
                                        autofocus />
                                </div>
                                {{-- Date of Acceptance --}}
                                <div class="mt-4 col-span-2 md:col-span-1">
                                    <x-label for="date_of_acceptance" :value="__('Date of Acceptance')" />
                                    <x-input id="date_of_acceptance" class="block mt-1 w-full" type="date"
                                        name="date_of_acceptance" value="{{ $byod->date_of_acceptance->format('Y-m-d') }}" required
                                        autofocus />
                                </div>
                                {{-- Division --}}
                                <div class="mt-4 col-span-2 md:col-span-1">
                                    <x-label for="division" :value="__('Division')" />
                                    <x-input-select id="division_id" class="block mt-1 w-full" name="division_id"
                                        required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $byod->division_id == $division->id ? 'selected' : '' }} {{ in_array($division->id, $user_division_ids) ? '' : 'disabled' }}>
                                                {{ $division->name }}</option>
                                        @endforeach
                                    </x-input-select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4 ">
                            <x-button class="ml-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
