<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <x-jet-banner />

    {{-- <div x-data="{ cartOpen: false }" class="min-h-screen bg-gradient-to-r from-blueGray-400">
            @livewire('navigation-menu')
            @if (isset($header))
                <header class="mx-6 py-4 px-4 sm:px-6 lg:px-8 mt-6 rounded-lg bg-gradient-to-r from-gray-100">
                    <div>
                        {{ $header }}
                    </div>
                </header>
            @endif
            <x-cart />
            <main>
                {{ $slot }}
            </main>
        </div> --}}

    <div x-data="{ cartOpen: false }" class="min-h-screen bg-gradient-to-r from-blueGray-400">
        @livewire('navigation-menu')
        <div class="flex flex-col flex-1 min-h-screen overflow-x-hidden overflow-y-auto">
            @if (isset($header))
                <header class="bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <x-cart />
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
