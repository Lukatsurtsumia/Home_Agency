<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Something Went Wrong - 500</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950">
    <div class="min-h-full flex items-center justify-center px-6">
        <div class="max-w-lg w-full text-center">
            <!-- Animated 500 -->
            <div class="relative mb-8">
                <div class="text-9xl font-bold bg-gradient-to-br from-sky-400 via-slate-400 to-slate-600 bg-clip-text text-transparent animate-pulse">
                    500
                </div>
                <div class="absolute inset-0 text-9xl font-bold text-slate-800 opacity-20 blur-xl -z-10">
                    500
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl font-bold text-white mb-4">
                Something Went Wrong
            </h1>

            <!-- Description (never leak exception details to visitors here) -->
            <p class="text-slate-400 mb-6 leading-relaxed">
                Sorry, something went wrong on our end. Please try again, or contact us
                directly if the problem continues.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="/"
                   class="inline-flex items-center justify-center px-6 py-3 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Go to Homepage
                </a>

                <button onclick="window.location.reload()"
                        class="inline-flex items-center justify-center px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Refresh Page
                </button>
            </div>

            <!-- Back Link -->
            <p class="text-slate-500 mt-8 text-sm">
                <a href="javascript:history.back()" class="text-sky-400 hover:text-sky-300 transition">
                    ← Go back to previous page
                </a>
            </p>

            <!-- Decorative Elements -->
            <div class="mt-12 relative">
                <div class="absolute inset-0 bg-gradient-to-t from-sky-500/10 to-transparent h-20 -z-10"></div>
                <div class="flex justify-center gap-2">
                    <div class="w-2 h-2 bg-sky-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-sky-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-sky-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
