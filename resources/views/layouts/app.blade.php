<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quí Kiệt') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

<body class=" font-sans antialiased" theme="mytheme">
    <div class="sticky top-0 z-50">
        <livewire:layout.navigation />
    </div>
    <!-- <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"> -->
    <div>
        @yield('content')
    </div>
    <!-- Page Heading -->

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <div>
        @livewire('layout.footer')

    </div>

    @yield('script')

    @livewireScripts
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <!-- Swiper JS -->


</body>

</html>