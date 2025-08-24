<x-guest-layout>
    @include('sweetalert::alert')

    <x-authentication-card>

        <x-slot name="logo">
            <img src="{{ asset('user/imgs/logoboonda.png') }}" alt="Logo" class="w-40 h-20">
            <!-- Ganti dengan logo kustom Anda -->

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <div class="mt-4">
                <div class="h-captcha" data-sitekey="{{ env('HCAPTCHA_SITEKEY') }}"></div>
                @error('h-captcha-response')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <script src="https://js.hcaptcha.com/1/api.js" async defer></script>


            <div class="block mt-4">
                 @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __('dont have Account?') }}
                    </a>
                @endif
               

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
