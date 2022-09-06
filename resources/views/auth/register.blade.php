<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ url('/img/India_Post_Logo.png') }}" alt="India Post Logo" class="w-32">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">

            @csrf
            <h3 class="text-center text-cyan-700 font-bold"> Registration </h3>
            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Employee ID -->
            <div class="mt-4">
                <x-label for="employee_id" :value="__('Employee ID')" />

                <x-input id="employee_id" class="block mt-1 w-full" type="number" name="employee_id" :value="old('employee_id')"
                    required />
            </div>

            <!-- Designation-->
            <div class="mt-4">
                <x-label for="designation" :value="__('Designation')" />

                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')"
                    required />
            </div>

            <!-- Office-->
            <div class="mt-4">
                <x-label for="office_id" :value="__('Office')" />

                <x-input-select id="office_id" class="block mt-1 w-full" name="office_id" required>
                    @foreach ($offices as $office)
                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                    @endforeach
                </x-input-select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <ul class="text-xs text-blue-900 font-semibold list-disc pl-6">
                    <li>Minimum 8 Characters</li>
                    <li>At least 1 Uppercase Letter & Lowercase Letter</li>
                    <li>At least 1 Number & 1 special character</li>
                </ul>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
