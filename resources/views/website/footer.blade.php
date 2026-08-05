<footer class="bg-slate-950 border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        {{-- Left: brand / tagline --}}
        <div class="space-y-1">
            <p class="text-sm font-semibold text-white">
                GaGo Agency
            </p>
            <p class="text-xs text-slate-400">
                {{ __('დაგეხმარებით იპოვოთ და შეიძინოთ საცხოვრებელი თბილისში.') }}
            </p>
        </div>

        {{-- Middle: quick links --}}
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400">
            <a href="{{ route('welcome') }}#about" class="hover:text-slate-200">{{ __('ჩვენ შესახებ') }}</a>
            <span class="w-1 h-1 rounded-full bg-slate-600 hidden sm:inline-block"></span>
            <a href="{{ route('welcome') }}#portfolio" class="hover:text-slate-200">{{ __('პორტფოლიო') }}</a>
            <span class="w-1 h-1 rounded-full bg-slate-600 hidden sm:inline-block"></span>
            <a href="{{ route('welcome') }}#contact" class="hover:text-slate-200">{{ __('კონტაქტი') }}</a>
        </div>

        {{-- Right: copyright + location --}}
        <div class="flex flex-wrap items-center gap-3 text-[11px] text-slate-500">
            <span>© {{ date('Y') }} GaGo Agency</span>
            <span class="hidden sm:inline text-slate-700">|</span>
            <span>{{ __('თბილისი · საქართველო') }}</span>
        </div>
    </div>
</footer>