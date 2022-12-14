<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors />

                    <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="name" :value="__('User Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required
                                    value="{{ $user->name }}" />
                            </div>
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" disabled
                                    value="{{ $user->email }}" />
                                <input type="hidden" name="email" value="{{ $user->email }}">
                            </div>

                            <div>
                                <x-label for="employee_id" :value="__('Employee ID')" />
                                <x-input id="employee_id" class="block mt-1 w-full" type="number" name="employee_id"
                                    required value="{{ $user->employee_id }}" />
                            </div>

                            <div>
                                <x-label for="designation" :value="__('Designation')" />
                                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation"
                                    required value="{{ $user->designation }}" />
                            </div>
                            <div>
                                <x-label for="offices" :value="__('Currently Assigned Offices')" />
                                <x-input-select id="offices" class="block mt-1 w-full" multiple disabled>
                                    @foreach ($offices as $office)
                                        @if ($user->offices->contains($office))
                                            <option value="{{ $office->id }}" selected>{{ $office->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </x-input-select>
                            </div>
                            <div>
                                <x-label for="office_ids" :value="__('Select Offices to assign')" />
                                <x-input-select id="office_ids" class="block mt-1 w-full" name="office_ids[]" multiple
                                    required>
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}"
                                            {{ $user->offices->contains($office) ? 'selected' : '' }}>
                                            {{ $office->name }}
                                        </option>
                                    @endforeach
                                </x-input-select>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold my-6">Roles</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ($roles as $role)
                                <div class="flex gap-4">
                                    <input type="checkbox" id="{{ 'role_' . $role->id }}"
                                        class="appearance-none checked:bg-blue-500" name="role_ids[]"
                                        value="{{ $role->id }}"
                                        {{ $user->hasRole([$role->name]) ? 'checked' : '' }} />
                                    <x-label for="{{ 'role_' . $role->id }}" value="{{ $role->name }}" />
                                </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-end mt-4 ">
                            <x-button class="ml-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
