<section id="portfolio" class="py-20 bg-slate-900 scroll-mt-32 section-fade" data-section-fade>
    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex items-end justify-between mb-14">
            <div>
                <h2 class="text-3xl font-semibold text-white mb-3">
                    წარმატებით განხორციელებული პროექტები
                </h2>
                <p class="text-slate-400 text-sm max-w-xl">
                    უძრავი ქონების პროექტები, რომლებიც ჩვენი გუნდის მხარდაჭერით შეირჩა, შეძენილ იქნა და სრულად გარემონტდა საცხოვრებელი ან საინვესტიციო მიზნებისთვის.
                </p>
            </div>

            <div class="hidden md:flex items-center gap-6 text-xs text-slate-400">
                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                    გაყიდული და გარემონტებული
                </span>

                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-sky-400 rounded-full"></span>
                    ოთახები და ფართობი
                </span>
            </div>
        </div>

        <!-- SCROLL AREA -->
        <div class="overflow-x-auto md:overflow-visible -mx-6 px-6">
            <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-2 w-max md:w-full">
                @forelse ($portfolios as $portfolio)
                    <article class="relative group rounded-2xl overflow-hidden bg-[#071326] border border-slate-800 shadow-xl hover:shadow-2xl transition duration-300 hover:-translate-y-1 w-[85vw] sm:w-[420px] md:w-auto flex-shrink-0 md:flex-shrink">
                        
                        <!-- IMAGE -->
                        <div class="relative h-[220px] overflow-hidden">
                            <img
                                src="{{ asset('storage/'.$portfolio->cover_image) }}"
                                onerror="this.onerror=null; this.src='{{ asset('storage/portfolio/default.jpg') }}';"
                                alt="{{ $portfolio->title }}"
                                class="w-full h-full object-cover transition duration-700 group-hover:scale-105"
                                loading="lazy"
                            />

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                            <span class="absolute bottom-4 left-4 text-xs px-3 py-1 rounded-full bg-black/60 backdrop-blur text-white">
                                {{ $portfolio->location ?? 'Saburtalo' }}
                            </span>

                            <span class="absolute bottom-4 right-4 text-xs px-3 py-1 rounded-full bg-emerald-400 text-black font-medium">
                                {{ $portfolio->status ?? 'Sold & renovated' }}
                            </span>
                        </div>

                        <!-- CONTENT -->
                        <div class="p-6 flex flex-col relative z-10">
                            <h3 class="text-lg font-semibold text-white leading-snug">
                                {{ $portfolio->address ?? 'Saburtalo, 2-bedroom with metro access' }}
                            </h3>

                            <p class="text-sm text-slate-400 mt-2 line-clamp-2">
                                {{ $portfolio->description ?? '65 m² apartment near Delisi metro. Full renovation, furnishing and preparation for long-term rental for an overseas client.' }}
                            </p>

                            <div class="flex items-center gap-6 text-xs text-slate-300 mt-4">
                                <span class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                                    {{ $portfolio->area ?? '65' }} m²
                                </span>

                                <span class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-sky-400 rounded-full"></span>
                                    {{ $portfolio->rooms ?? '3' }} ოთახი
                                </span>

                                <span class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                                 გაყიდულია
                                </span>
                            </div>

                            <span class="text-xs text-sky-400 mt-4 inline-flex items-center gap-1 group-hover:underline">
                                მიმოხილვა
                            </span>

                            <div class="mt-auto text-right text-xl font-bold text-yellow-100">
                                ${{ number_format($portfolio->price, 0, '', ' ') }}
                            </div>
                        </div>

                        <a href="{{ route('images', $portfolio->id) }}" class="absolute inset-0 z-0"></a>
                    </article>
                @empty
                    <p class="text-slate-400 col-span-3 text-center">
                        No portfolio projects yet
                    </p>
                @endforelse
            </div>
        </div>

    </div>
</section>