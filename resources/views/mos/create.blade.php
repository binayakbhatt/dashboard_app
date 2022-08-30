<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('mos.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="office_id" :value="__('Office')" />
                                <x-input-select id="office_id" class="block mt-1 w-full" name="office_id" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </x-input-select>
                            </div>
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="set_id" :value="__('Set')" />
                                <x-input-select id="set_id" class="block mt-1 w-full" name="set_id" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($sets as $set)
                                        <option value="{{ $set->id }}">{{ $set->name }}</option>
                                    @endforeach
                                </x-input-select>
                            </div>
                            @foreach ($int_fields as $field)
                                <div class="mt-4">
                                    <x-label for="{{ $field }}" :value="__(
                                        ucfirst(str_replace('WS', 'Working Strength', str_replace('_', ' ', $field))),
                                    )" />
                                    <x-input id="{{ $field }}" class="block mt-1 w-full" type="number"
                                        name="{{ $field }}" :value="old($field)" required />
                                </div>
                            @endforeach
                            @foreach ($boolean_fields as $field => $label)
                                <div class="mt-4">
                                    <x-label for="{{ $field }}" :value="__(ucfirst(str_replace('_', ' ', $label)))" />
                                    <x-input-select id="{{ $field }}" class="block mt-1 w-full"
                                        name="{{ $field }}">
                                        <option value="1" {{ old($field) == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old($field) == 0 ? 'selected' : '' }}>No</option>
                                    </x-input-select>
                                </div>
                            @endforeach
                            <div class="mt-4 col-span-2 md:col-span-1">
                                <x-label for="remarks" :value="__('Remarks')" />
                                <x-input id="remarks" class="block mt-1 w-full" type="text" name="remarks"
                                    :value="old('remarks')" />
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
