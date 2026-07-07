@extends('layouts.main')

@section('content')
<section class="bg-slate-950 lg:flex lg:flex-col lg:h-[calc(100vh-5rem)] lg:overflow-hidden">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-5 lg:flex-1 lg:min-h-0 lg:flex lg:flex-col">

        <a href="{{ route('welcome') }}#portfolio" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition mb-4 shrink-0 w-fit">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            პორტფოლიოში დაბრუნება
        </a>

        <div
            x-data="portfolioGallery()"
            x-effect="document.body.style.overflow = lightboxOpen ? 'hidden' : ''"
            @keydown.escape.window="lightboxOpen = false"
            @keydown.arrow-right.window="lightboxOpen && nextImage()"
            @keydown.arrow-left.window="lightboxOpen && prevImage()"
            class="lg:flex-1 lg:min-h-0"
        >
            <div class="flex flex-col gap-5 lg:grid lg:gap-8 lg:h-full lg:grid-cols-[minmax(0,1fr)_360px] xl:grid-cols-[minmax(0,1fr)_400px]">

                <!-- LEFT: GALLERY -->
                <div class="flex flex-col gap-3 min-w-0 lg:min-h-0 lg:h-full">

                    <!-- MAIN IMAGE -->
                    <div
                        class="relative group rounded-2xl sm:rounded-3xl bg-white/5 ring-1 ring-white/10 p-2 sm:p-3 select-none flex items-center justify-center lg:flex-1 lg:min-h-0"
                        @touchstart="touchStartX = $event.changedTouches[0].screenX"
                        @touchend="handleSwipe($event)"
                    >
                        <img
                            :src="images[currentIndex]"
                            :class="fading ? 'opacity-0' : 'opacity-100'"
                            alt="{{ $portfolio->address ?? $portfolio->title }} — რემონტის ფოტო"
                            class="w-full h-auto max-h-[46vh] object-contain rounded-xl sm:rounded-2xl transition-opacity duration-200 cursor-zoom-in lg:h-full lg:max-h-full"
                            @click="suppressClick ? (suppressClick = false) : openLightbox()"
                        >

                        <button
                            @click="prevImage"
                            aria-label="წინა ფოტო"
                            class="absolute left-2.5 lg:left-5 top-1/2 -translate-y-1/2
                            bg-black/60 hover:bg-black text-white
                            w-9 h-9 lg:w-11 lg:h-11 rounded-full flex items-center justify-center text-lg opacity-80 group-hover:opacity-100 transition">
                            ‹
                        </button>

                        <button
                            @click="nextImage"
                            aria-label="შემდეგი ფოტო"
                            class="absolute right-2.5 lg:right-5 top-1/2 -translate-y-1/2
                            bg-black/60 hover:bg-black text-white
                            w-9 h-9 lg:w-11 lg:h-11 rounded-full flex items-center justify-center text-lg opacity-80 group-hover:opacity-100 transition">
                            ›
                        </button>

                        <button
                            @click="openLightbox()"
                            aria-label="სრულ ეკრანზე ნახვა"
                            class="absolute top-3.5 right-3.5 sm:top-5 sm:right-5 bg-black/60 hover:bg-black text-white w-9 h-9 rounded-full flex items-center justify-center opacity-80 group-hover:opacity-100 transition"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 8.25V6a2.25 2.25 0 012.25-2.25h2.25M3.75 15.75V18a2.25 2.25 0 002.25 2.25h2.25m8.25-15h2.25A2.25 2.25 0 0121 6v2.25m0 7.5V18a2.25 2.25 0 01-2.25 2.25h-2.25" />
                            </svg>
                        </button>

                        <span class="absolute bottom-3.5 left-3.5 sm:left-5 text-[11px] font-medium px-2.5 py-1 rounded-full bg-black/60 text-white backdrop-blur" x-text="(currentIndex + 1) + ' / ' + images.length"></span>
                    </div>

                    <!-- THUMBNAILS -->
                    <div class="relative shrink-0">
                        <div class="overflow-x-auto pb-1 snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden [scrollbar-width:none]">
                            <div class="flex gap-2.5 min-w-max" x-ref="thumbs">
                                @foreach($portfolio->images as $index => $image)
                                    <button
                                        type="button"
                                        @click="setImage({{ $index }})"
                                        aria-label="ფოტო {{ $index + 1 }}"
                                        class="relative snap-center w-16 h-14 sm:w-20 sm:h-16 md:w-24 md:h-20 rounded-lg overflow-hidden ring-2 transition flex-shrink-0"
                                        :class="currentIndex == {{ $index }} ? 'ring-sky-500 opacity-100' : 'ring-transparent opacity-60 hover:opacity-90'"
                                    >
                                        <img
                                            src="{{ asset('storage/'.$image->image) }}"
                                            alt="{{ $portfolio->address ?? $portfolio->title }} — თამბნეილი {{ $index + 1 }}"
                                            class="w-full h-full object-cover"
                                        >
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-slate-950 to-transparent"></div>
                    </div>
                </div>

                <!-- RIGHT: address, specs, price, CTA (grouped & centered on desktop) -->
                <aside class="flex flex-col min-w-0 gap-4 lg:min-h-0 lg:h-full lg:justify-center">

                        <!-- ADDRESS / TITLE -->
                        <div class="shrink-0">
                            <p class="text-[0.68rem] font-medium uppercase tracking-[0.25em] text-slate-500 mb-2">
                                მისამართი
                            </p>
                            <h1 class="text-xl sm:text-2xl xl:text-3xl font-semibold text-white leading-tight">
                                {{ $portfolio->address ?? $portfolio->title }}
                            </h1>
                        </div>

                        <!-- FACTS CARD: area · rooms · price -->
                        <div class="shrink-0 rounded-2xl bg-white/5 ring-1 ring-white/10 overflow-hidden">
                            <div class="grid grid-cols-2 divide-x divide-white/10">
                                <div class="px-4 py-3.5">
                                    <p class="text-[0.6rem] font-medium uppercase tracking-[0.2em] text-slate-500 mb-1.5">ფართობი</p>
                                    <p class="flex items-center gap-1.5 text-white font-semibold text-sm">
                                        <svg class="w-4 h-4 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9m11.25-5.25h-4.5m4.5 0v4.5m0-4.5L15 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15m11.25 5.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                        </svg>
                                        {{ $portfolio->area ?? '—' }} მ²
                                    </p>
                                </div>
                                <div class="px-4 py-3.5">
                                    <p class="text-[0.6rem] font-medium uppercase tracking-[0.2em] text-slate-500 mb-1.5">ოთახები</p>
                                    <p class="flex items-center gap-1.5 text-white font-semibold text-sm">
                                        <svg class="w-4 h-4 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M2.25 12l8.954-8.955a1.125 1.125 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                        </svg>
                                        {{ $portfolio->rooms ?? '—' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between px-4 py-3.5 border-t border-white/10">
                                <p class="text-[0.6rem] font-medium uppercase tracking-[0.2em] text-slate-500">ფასი</p>
                                <p class="text-2xl font-bold text-yellow-100">${{ number_format($portfolio->price, 0, '', ' ') }}</p>
                            </div>
                        </div>

                    <!-- CTA -->
                    <a
                        href="{{ route('welcome') }}#contact"
                        class="shrink-0 inline-flex w-full items-center justify-center gap-2 px-6 py-4 rounded-xl bg-sky-500 hover:bg-sky-400 text-white text-sm font-semibold transition shadow-lg shadow-sky-950/40"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 10.5h7.5m-7.5 3H12M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ანალოგიური პროექტის მოთხოვნა
                    </a>
                </aside>
            </div>

            <!-- LIGHTBOX (teleported to <body> so it covers the entire screen, nav included) -->
            <template x-teleport="body">
            <div
                x-show="lightboxOpen"
                x-transition.opacity
                @click.self="lightboxOpen = false"
                class="fixed inset-0 z-[999] bg-slate-950/95 backdrop-blur-sm flex items-center justify-center p-4 sm:p-8"
                style="display: none;"
                @touchstart="touchStartX = $event.changedTouches[0].screenX"
                @touchend="handleSwipe($event)"
            >
                <img
                    :src="images[currentIndex]"
                    :class="fading ? 'opacity-0' : 'opacity-100'"
                    alt="{{ $portfolio->address ?? $portfolio->title }} — გადიდებული ფოტო"
                    class="max-w-full max-h-full object-contain rounded-lg transition-opacity duration-200 select-none"
                >

                <button
                    @click="lightboxOpen = false"
                    aria-label="დახურვა"
                    class="absolute top-4 right-4 sm:top-6 sm:right-6 bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-full flex items-center justify-center transition"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <button
                    @click="prevImage"
                    aria-label="წინა ფოტო"
                    class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center text-xl transition">
                    ‹
                </button>

                <button
                    @click="nextImage"
                    aria-label="შემდეგი ფოტო"
                    class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center text-xl transition">
                    ›
                </button>

                <span class="absolute bottom-6 left-1/2 -translate-x-1/2 text-xs font-medium px-3 py-1.5 rounded-full bg-white/10 text-white" x-text="(currentIndex + 1) + ' / ' + images.length"></span>
            </div>
            </template>
            <!-- /LIGHTBOX -->

        </div>
        <!-- /x-data gallery wrapper -->
    </div>
    <!-- /container -->
</section>

<script>
function portfolioGallery() {
    return {
        currentIndex: 0,
        touchStartX: 0,
        suppressClick: false,
        fading: false,
        lightboxOpen: false,
        images: [
            @foreach($portfolio->images as $image)
                "{{ asset('storage/'.$image->image) }}",
            @endforeach
        ],
        goTo(i) {
            this.fading = true;
            setTimeout(() => {
                this.currentIndex = i;
                this.fading = false;
            }, 150);
        },
        nextImage() {
            this.goTo((this.currentIndex + 1) % this.images.length)
            this.scrollThumbIntoView()
        },
        prevImage() {
            this.goTo((this.currentIndex - 1 + this.images.length) % this.images.length)
            this.scrollThumbIntoView()
        },
        setImage(i) {
            this.goTo(i)
            this.scrollThumbIntoView()
        },
        openLightbox() {
            this.lightboxOpen = true;
        },
        handleSwipe(e) {
            const delta = e.changedTouches[0].screenX - this.touchStartX;
            if (Math.abs(delta) < 40) return;
            this.suppressClick = true;
            delta < 0 ? this.nextImage() : this.prevImage();
        },
        scrollThumbIntoView() {
            this.$nextTick(() => {
                const el = this.$refs.thumbs?.children[this.currentIndex];
                el?.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            })
        }
    }
}
</script>
@endsection
