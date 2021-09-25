<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('register.attempt') }}">
            @csrf
            <div class="mb-4">
                <h1 class="font-bold text-lg text-center">Welcome to Nexus Online Electronics Store .</h1>
                <p class="text-gray-400 mb-2 text-center text-sm">The right place to find your electronics devices for your daily activities.</p>
                <hr>
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                @error('email')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                @error('password')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <span class="text-red-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <button class="block bg-gray-800 w-full text-center text-white mt-4 py-2 rounded hover:bg-gray-900 transition-colors duration-150" type="submit">Register</button>

            <p class="mt-5 text-center">Or</p>

            <a href="" class="block bg-gray-200 w-full text-center py-2 mt-4 rounded hover:bg-gray-300 transition-colors duration-150">
                <i class="fab fa-google"></i>
                Continue with Google
            </a>
            <p class="mt-3 text-md">Already register ? <span><a href="{{ route("login") }}" class="text-blue-600 underline">Login</a></span></p>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
