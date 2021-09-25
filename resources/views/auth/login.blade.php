<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf
            
            <div class="mb-4">
                <h1 class="font-bold text-lg text-center">Welcome Back , Please login first .</h1>
                <p class="text-gray-400 mb-2 text-center text-sm">The best place to find all electronics stuff . Original and Trusted marketplace .</p>
                <hr>
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                @error('email')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            
            <button class="block bg-gray-800 w-full text-center text-white mt-4 py-2 rounded hover:bg-gray-900 transition-colors duration-150" type="submit">Login</button>

            <div class="flex items-center justify-end mt-4">
                <p class="text-sm font-light text-gray-600">Doesn't have an account ? <span><a href="{{ route("register") }}" class="text-blue-600 underline">Register</a></span></p>

            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
