<footer class="bg-slate-950 border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        {{-- Left: brand / tagline --}}
        <div class="space-y-1">
            <p class="text-sm font-semibold text-white">
                Tbilisi Apartment Advisor
            </p>
            <p class="text-xs text-slate-400">
                Helping buyers find and secure apartments in Tbilisi.
            </p>
        </div>

        {{-- Middle: quick links --}}
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400">
            <a href="#about" class="hover:text-slate-200">About</a>
            <span class="w-1 h-1 rounded-full bg-slate-600 hidden sm:inline-block"></span>
            <a href="#Portfolio" class="hover:text-slate-200">Recent deals</a>
            <span class="w-1 h-1 rounded-full bg-slate-600 hidden sm:inline-block"></span>
            <a href="#contact-intro" class="hover:text-slate-200">Contact</a>
        </div>

        {{-- Right: copyright + location --}}
        <div class="flex flex-wrap items-center gap-3 text-[11px] text-slate-500">
            <span>© {{ date('Y') }} Tbilisi Apartment Advisor</span>
            <span class="hidden sm:inline text-slate-700">|</span>
            <span>Tbilisi · Georgia</span>
        </div>
    </div>
</footer>