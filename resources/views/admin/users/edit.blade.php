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
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required value="{{ $user->name }}" />
                            </div>
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" disabled value="{{ $user->email }}" />
                                <input type="hidden" name="email" value="{{ $user->email }}">
                            </div>

                            <div>
                                <x-label for="employee_id" :value="__('Employee ID')" />
                                <x-input id="employee_id" class="block mt-1 w-full" type="number" name="employee_id" required value="{{ $user->employee_id }}" />
                            </div>

                            <div>
                                <x-label for="designation" :value="__('Designation')" />
                                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" required value="{{ $user->designation }}" />
                            </div>
                            
                            <div>
                                <x-label for="role_id" :value="__('Role')" />
                                <x-input-select id="role_id" class="block mt-1 w-full" name="role_id" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </x-input-select>
                            </div>
                            <div>
                                <x-label for="office_id" :value="__('Office')" />
                                <x-input-select id="office_id" class="block mt-1 w-full" name="office_id" required>
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}" {{ $office->id == $user->office_id ? 'selected' : '' }}>{{ $office->name }}</option>
                                    @endforeach
                                </x-input-select>
                            </div>
                            <div>
                                <x-label for="is_active" :value="__('Status')" />
                                <x-input-select id="is_active" class="block mt-1 w-full" name="is_active" required>
                                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                                </x-input-select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4 ">
                            <x-button class="ml-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
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