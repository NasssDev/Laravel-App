<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
        <!-- Scripts -->
{{--        <link rel="stylesheet" href="../../css/app.css">--}}
{{--        <script src="../../js/app.js" defer></script>--}}
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline"
                >Dashboard</a
                >
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"
                >Log in</a
                >
                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 underline"
                    >Register</a
                    >
                    <a
                        href="{{ route('contact') }}"
                        class="ml-4 text-sm text-gray-700 underline"
                    >Contact</a
                    >
                @endif
            @endauth
        </div>
    @endif
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"></x-application-logo>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script>

    </script>
    </body>
</html>
