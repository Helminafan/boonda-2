<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center" style="background-image: url('{{ asset('user/imgs/pattren1.png') }}');">
        <div>
            <img src="{{ asset('user/imgs/logoboonda.png') }}" alt="Logo" class="w-40 h-20 mx-auto"> <!-- Logo kustom -->
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-80 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</x-guest-layout>
