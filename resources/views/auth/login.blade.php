<x-layouts.layout title="login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Contenedor que centra el formulario y le da el espacio uniforme -->
    <div class="bg-gradient-to-r from-yellow-400 to-red-600 via-yellow-500 p-4 h-screen flex items-center justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/3 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg flex flex-col justify-between h-auto ">
            @csrf

            <!-- Título centrado con espacio -->
            <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200 mb-4">Iniciar Sesión</h1>


            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" class="checkbox checkbox-primary" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</label>
            </div>

            <!-- Enlaces y botón -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layouts.layout>
