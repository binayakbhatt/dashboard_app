<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-start-1">
                        <x-label for="rtn_id" :value="__('Select RTN')" />
                        @error('rtn_id')
                            <label for="address" class="text-xs text-red-700 block">{{ $message }}</label>
                        @enderror
                        <x-input-select id="rtn_id" wire:model="rtn_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="" selected readonly>Select</option>
                            @foreach ($rtns as $rtn)
                                <option value="{{ $rtn->id }}" selected readonly>{{ $rtn->name }}
                                </option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="">
                        <x-label for="recording_office_id" :value="__('Recording Office')" />
                        @error('recording_office_id')
                            <label for="address" class="text-xs text-red-700 block">{{ $message }}</label>
                        @enderror
                        <x-input-select id="recording_office_id" wire:model="recording_office_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="" selected readonly>Select</option>
                            @foreach ($userOffices as $userOffice)
                                <option value="{{ $userOffice->id }}" selected readonly>{{ $userOffice->name }}
                                </option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="col-start-1">
                        <x-label for="arrived_at" :value="__('Arrived at (YYYY-MM-DD HH:MM)')" />
                        @error('arrived_at')
                            <label for="address" class="text-xs text-red-700 block">{{ $message }}</label>
                        @enderror
                        <div x-data x-init="flatpickr($refs.datetimewidget, { wrap: true, time_24hr: true, enableTime: true, dateFormat: 'Y-m-d H:i' });" x-ref="datetimewidget"
                            class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-1">
                            <div class="flex align-middle align-content-center">
                                <input x-ref="datetime" type="text" id="datetime" data-input placeholder="Select.."
                                    wire:model="arrived_at" required value="{{ $arrived_at }}"
                                    class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm">
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-label for="departed_at" :value="__('Departed at (YYYY-MM-DD HH:MM)')" />
                        @error('departed_at')
                            <label for="address" class="text-xs text-red-700 block">{{ $message }}</label>
                        @enderror
                        <div x-data x-init="flatpickr($refs.datetimewidget, { wrap: true, time_24hr: true, enableTime: true, dateFormat: 'Y-m-d H:i' });" x-ref="datetimewidget"
                            class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-1">
                            <div class="flex align-middle align-content-center">
                                <input x-ref="datetime" type="text" id="datetime" data-input placeholder="Select.."
                                    wire:model="departed_at" required value="{{ $departed_at }}"
                                    class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm">
                            </div>
                        </div>
                    </div>

                    @if ($offices !== null)
                        @foreach ($offices as $office)
                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="md:col-span-2 font-bold">
                                    {{ $office->name }}
                                </div>
                                <div>
                                    <x-label for="bags_dispatched" :value="__('Bags dispatched')" />
                                    @error('bags_dispatched.' . $office->id)
                                        <label for="address"
                                            class="text-xs text-red-700 block">{{ $message }}</label>
                                    @enderror
                                    <x-input id="bags_dispatched" class="block mt-1 w-full" type="number"
                                        wire:model="bags_dispatched.{{ $office->id }}" required />
                                </div>
                                <div>
                                    <x-label for="bags_left" :value="__('Bags left')" />
                                    @error('bags_left.' . $office->id)
                                        <label for="address"
                                            class="text-xs text-red-700 block">{{ $message }}</label>
                                    @enderror
                                    <x-input id="bags_left" class="block mt-1 w-full" type="number"
                                        wire:model="bags_left.{{ $office->id }}" required />
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="col-start-1 md:col-span-2 mt-4">
                        <x-label for="remarks" :value="__('Remarks')" />
                        @error('remarks')
                            <label for="address" class="text-xs text-red-700 block">{{ $message }}</label>
                        @enderror
                        <x-textarea id="remarks" class="block mt-1 w-full" type="text" wire:model="remarks"
                            required value="{{ $remarks }}"></x-textarea>
                    </div>

                    <div class="col-start-1 md:col-span-2 mt-4">
                        <x-button wire:click="submit" class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
