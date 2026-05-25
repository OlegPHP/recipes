@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', 'Редактировать профиль')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" class="text-white" />
                            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full bg-gray-100 text-gray-900" :value="old('name', $user->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" class="text-white" />
                            <x-text-input id="email" name="email" type="email" class="block mt-1 w-full bg-gray-100 text-gray-900" :value="old('email', $user->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mt-4">
                            <x-input-label for="current_password" :value="__('Current Password')" class="text-white" />
                            <x-text-input id="current_password" name="current_password" type="password" class="block mt-1 w-full bg-gray-100 text-gray-900" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-red-400" />
                        </div>

                        <!-- New Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('New Password')" class="text-white" />
                            <x-text-input id="password" name="password" type="password" class="block mt-1 w-full bg-gray-100 text-gray-900" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full bg-gray-100 text-gray-900" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <div class="mt-4 text-white">
                            <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}</p>
                            <p>{{ __('Are you sure you want to delete your account?') }}</p>
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="bg-red-600 hover:bg-red-700 text-white">
                                {{ __('Delete Account') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
