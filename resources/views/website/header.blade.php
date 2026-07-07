<header class="sticky top-0 z-50 isolate border-b border-slate-200 bg-[#f5f3ef]/95 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 sm:h-18 lg:h-20 items-center justify-between gap-4">

            {{-- Logo --}}
         <a href="/" class="flex items-center gap-3 flex-shrink-0">
    <svg
        class="w-10 h-10 text-slate-900"
        viewBox="0 0 180 180"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            d="M90 20
               L30 60
               V120
               L90 160
               L150 120
               V95
               H95
               V120
               L65 100
               V80
               L90 60
               H150
               V60
               L90 20Z"
            fill="currentColor"
        />
    </svg>

    <div class="flex flex-col leading-tight">
        <span class="text-[0.6rem] sm:text-[0.65rem] font-medium uppercase tracking-[0.3em] text-slate-500">
            GAGO AGENCY
        </span>
        <span class="text-xs sm:text-sm lg:text-base font-semibold text-slate-900">
            Tbilisi · Georgia
        </span>
    </div>
</a>

            {{-- Desktop Navigation --}}
     <nav class="hidden md:flex items-center gap-5 lg:gap-6">
    @foreach([
        'home' => 'მთავარი',
        'services' => 'სერვისები',
        'calculator' => 'კალკულატორი',
        'portfolio' => 'პორტფოლიო',
        'about' => 'ჩვენ შესახებ',
    ] as $id => $label)

        @php
            $href = $id === 'home' ? '/' : route('welcome').'#'.$id;
            $isHome = $id === 'home';
        @endphp

        <a href="{{ $href }}" 
           @if($isHome)
           onclick="window.location.href='/'"
           @endif
           class="group relative text-[0.68rem] lg:text-[0.72rem] font-medium uppercase tracking-[0.2em] text-slate-600 hover:text-slate-900 transition">
            <span>{{ $label }}</span>
            <span class="pointer-events-none absolute left-0 -bottom-1 h-px w-0 bg-slate-900 transition-all duration-300 group-hover:w-full"></span>
        </a>
    @endforeach
</nav>

            {{-- Desktop CTA --}}
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ route('welcome') }}#contact" class="inline-flex items-center rounded-full border border-slate-900/80 bg-slate-900 px-4 py-2 text-[0.62rem] font-semibold uppercase tracking-[0.18em] text-[#f5f3ef] hover:bg-transparent hover:text-slate-900 transition-colors duration-200 whitespace-nowrap">
                    კონტაქტი
                </a>

                 @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-red-900 hover:text-[#f5f3ef] transition">
                            გამოსვლა
                        </button>
                    </form>
                    <form method="POST" action="{{ route('portfolio.create') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">
                        პროფილი
                    </button>
                </form>
                @endauth

            </div>
           
            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-button" type="button" class="md:hidden inline-flex items-center justify-center rounded-full border border-slate-400/60 bg-[#f5f3ef] p-2 text-slate-800 hover:bg-slate-900 hover:text-[#f5f3ef] transition">
                <span class="sr-only">მენიუს გახსნა</span>
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="md:hidden hidden border-t border-slate-200/70 bg-[#f5f3ef]">
        <div class="mx-auto max-w-7xl px-4 py-4 space-y-1">
            <a href="/" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-800 hover:bg-slate-900 hover:text-[#f5f3ef] transition">მთავარი</a>
            <a href="{{ route('welcome') }}#services" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">სერვისები</a>
            <a href="{{ route('welcome') }}#calculator" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-800 hover:bg-slate-900 hover:text-[#f5f3ef] transition">კალკულატორი</a>
            <a href="{{ route('welcome') }}#portfolio" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">პორტფოლიო</a>
            <a href="{{ route('welcome') }}#contact" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">კონტაქტი</a>
            <a href="{{ route('welcome') }}#about" class="block rounded-lg px-3 py-2.5 text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">ჩვენ შესახებ</a>

            @auth
            
                <form method="POST" action="{{ route('portfolio.create') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left text-xs font-medium uppercase tracking-[0.18em] text-slate-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">
                        პროფილი
                    </button>
                </form>
                    <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left text-xs font-medium uppercase tracking-[0.18em] text-red-700 hover:bg-slate-900 hover:text-[#f5f3ef] transition">
                        გამოსვლა
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>