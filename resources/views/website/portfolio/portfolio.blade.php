<section id="portfolio" class="py-20 bg-slate-900 scroll-mt-32 section-fade" data-section-fade>
    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 sm:mb-14">
            <div>
                <h2 class="text-2xl sm:text-3xl font-semibold text-white mb-3">
                    {{ __('წარმატებით განხორციელებული პროექტები') }}
                </h2>
                <p class="text-slate-400 text-sm max-w-xl">
                    {{ __('უძრავი ქონების პროექტები, რომლებიც ჩვენი გუნდის მხარდაჭერით შეირჩა, შეძენილ იქნა და სრულად გარემონტდა საცხოვრებელი ან საინვესტიციო მიზნებისთვის.') }}
                </p>
            </div>

            @if($portfolios->count())
                <div class="inline-flex items-center gap-2 self-start rounded-full border border-slate-800 bg-slate-950/60 px-4 py-2 text-xs font-medium text-slate-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    {{ $portfolios->count() }} {{ __('დასრულებული პროექტი') }}
                </div>
            @endif
        </div>

        <!-- SCROLL AREA -->
        <div id="portfolio-track" class="overflow-x-auto md:overflow-visible -mx-6 px-6 snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden [scrollbar-width:none]">
            <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mt-2 w-max md:w-full">
                @forelse ($portfolios as $portfolio)
                    <article
                        data-portfolio-card
                        data-index="{{ $loop->index }}"
                        class="group relative flex flex-col h-full snap-center rounded-2xl overflow-hidden bg-[#0b1a2f] border border-slate-800 shadow-xl hover:shadow-2xl hover:border-slate-700 transition duration-300 hover:-translate-y-1 w-[85vw] sm:w-[420px] md:w-auto flex-shrink-0 md:flex-shrink"
                    >
                        <!-- IMAGE -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-800">
                            <img
                                src="{{ asset('storage/'.$portfolio->cover_image) }}"
                                alt="{{ $portfolio->address ?? $portfolio->title }}"
                                class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-105"
                                loading="lazy"
                            />

                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/5 to-transparent"></div>

                            <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 text-[11px] font-medium px-3 py-1 rounded-full bg-emerald-400/95 text-emerald-950 backdrop-blur">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-950"></span>
                                {{ __('გაყიდული და გარემონტებული') }}
                            </span>
                        </div>

                        <!-- CONTENT -->
                        <div class="flex flex-col flex-1 p-5 sm:p-6">
                            <h3 class="text-lg font-semibold text-white leading-snug line-clamp-1">
                                {{ $portfolio->address ?? __('მისამართი მალე დაემატება') }}
                            </h3>

                            <p class="text-sm text-slate-400 mt-2 line-clamp-2 min-h-[2.6rem]">
                                {{ __('დასრულებული სარემონტო პროექტი, მორგებული საცხოვრებელი ან საინვესტიციო საჭიროებისთვის.') }}
                            </p>

                            <div class="flex items-center gap-5 text-xs text-slate-300 mt-4">
                                <span class="inline-flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9m11.25-5.25h-4.5m4.5 0v4.5m0-4.5L15 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15m11.25 5.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                    </svg>
                                    {{ $portfolio->area ?? '—' }} მ²
                                </span>

                                <span class="inline-flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M2.25 12l8.954-8.955a1.125 1.125 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                    </svg>
                                    {{ $portfolio->rooms ?? '—' }} {{ __('ოთახი') }}
                                </span>
                            </div>

                            <div class="mt-auto pt-4 border-t border-slate-800 flex items-center justify-between gap-3">
                                <span class="text-xs font-medium text-sky-400 group-hover:text-sky-300 inline-flex items-center gap-1 transition">
                                    {{ __('პროექტის ნახვა') }}
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                                <span class="text-lg font-bold text-yellow-100 whitespace-nowrap">
                                    ${{ number_format($portfolio->price, 0, '', ' ') }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ route('images', $portfolio->id) }}" class="absolute inset-0 z-10" aria-label="{{ $portfolio->address ?? $portfolio->title }} — პროექტის დეტალები"></a>
                    </article>
                @empty
                    <p class="text-slate-400 col-span-3 text-center">
                        No portfolio projects yet
                    </p>
                @endforelse
            </div>
        </div>

        @if($portfolios->count() > 1)
            <div class="flex md:hidden justify-center gap-1.5 mt-6">
                @foreach ($portfolios as $index => $portfolio)
                    <span class="portfolio-dot w-1.5 h-1.5 rounded-full bg-slate-700 transition-all duration-300" data-index="{{ $index }}"></span>
                @endforeach
            </div>
        @endif

    </div>
</section>
