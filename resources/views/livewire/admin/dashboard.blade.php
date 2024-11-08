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

    <!-- Font awsome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="dark font-sans antialiased">
    <div class="min-h-screen bg-gray-900">
        <div class="flex h-screen overflow-hidden">

            <livewire:admin.components.navigation-dashboard />

            <!-- Page Content -->
            <main class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <!-- Page Heading Content -->
                <livewire:admin.components.header-dashboard />

                <!-- Page Content Body -->

                @yield('content')
            </main>
        </div>
    </div>

    @yield('script')
    @livewireScripts
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>