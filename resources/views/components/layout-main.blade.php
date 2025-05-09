<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/dist/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>STANCELAND</title>

    <!-- Fonts -->

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<link rel="icon" href="{{ asset('favicon.webp') }}">

<body class="bg-background text-fontcolor flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        <x-navbar />
    </header>

    <div class="container mx-auto">
        @yield('content')
    </div>


    <x-footer />

</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>