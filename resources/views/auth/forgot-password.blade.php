<x-guest-layout>
    @include('sweetalert::alert')

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address ') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('forgetpassword.store') }}">
            @csrf
            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <div class="block">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"  />
            </div>
            <div class="block">
                <x-label for="confirm-password" value="{{ __('Confirm Password') }}" />
                <x-input id="confirm-password" class="block mt-1 w-full" type="password" name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __(' Reset Password ') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
