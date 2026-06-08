<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Agency') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body class="bg-[#f5f3ef] text-slate-900 antialiased min-h-screen overflow-x-hidden" style="font-family: 'Noto Sans Georgian', sans-serif;">
    <div class="min-h-screen flex flex-col overflow-x-hidden">
        @include('website.header')

        <main class="relative z-0 flex-1 w-full max-w-full overflow-x-hidden">
            @yield('content')
        </main>

        @include('website.footer')
    </div>

    @stack('scripts')
</body>
</html>