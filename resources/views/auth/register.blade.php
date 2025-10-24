<x-guest-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-6">
        <div
            class="w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-700 transition-transform duration-300 hover:scale-[1.01]">

            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
                    {{ __('Create Account') }}
                </h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                    Join us today — it only takes a minute!
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <x-text-input id="name"
                            class="block w-full pl-10 pr-3 py-2 rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900/50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <x-text-input id="email"
                            class="block w-full pl-10 pr-3 py-2 rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900/50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <x-text-input id="password"
                            class="block w-full pl-10 pr-3 py-2 rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900/50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </span>
                        <x-text-input id="password_confirmation"
                            class="block w-full pl-10 pr-3 py-2 rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900/50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div>
                    @foreach ($roles as $role)
                        <label for="role">{{ $role->name }}</label>
                        <input type="checkbox" name="role" id="" value="{{ $role->name }}">
                    @endforeach
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}"
                        class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium transition">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button
                        class="px-6 py-2.5 rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-400 dark:focus:ring-indigo-600 transition font-semibold shadow-md hover:shadow-lg">
                        <i class="fa-solid fa-user-plus mr-2"></i>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
