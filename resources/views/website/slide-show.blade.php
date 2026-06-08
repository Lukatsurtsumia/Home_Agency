@php $first = $slides[0] ?? null; @endphp

@if($first)
<section id="slideshow" class="relative">
    <div class="relative min-h-screen max-h-[100vh] bg-slate-900">
        {{-- Background image from Laravel --}}
        <div class="absolute inset-0">
            <div id="hero-bg"
                 class="h-full w-full bg-cover bg-center transition-[background-image] duration-700 ease-out"
                 style="background-image: url('{{ $first['image'] }}');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-tr from-black/65 via-black/45 to-black/15"></div>
        </div>
        
        {{-- Content from Laravel --}}
        <div class="relative h-full">
            <div class="mx-auto flex min-h-screen max-w-6xl items-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-xl sm:max-w-2xl text-white">
                    <p id="hero-label"
                       class="text-[0.7rem] font-medium uppercase tracking-[0.32em] text-slate-200/80">
                        {{ $first['label'] }}
                    </p>
                    <div class="mt-4 h-px w-16 bg-white/70"></div>
                    <h1 id="hero-title"
                        class="mt-4 text-3xl sm:text-4xl md:text-5xl lg:text-[3.1rem] font-semibold tracking-tight leading-tight">
                        {{ $first['title'] }}
                    </h1>
                    <p id="hero-text"
                       class="mt-5 text-sm sm:text-base md:text-lg text-slate-100/90 max-w-lg leading-relaxed">
                        {{ $first['text'] }}
                    </p>


                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="#contact"
                           class="inline-flex items-center rounded-full bg-white px-6 py-2.5 text-xs font-semibold uppercase tracking-[0.2em] text-slate-900 hover:bg-slate-900 hover:text-[#f5f3ef] transition">
                            ვიზიტის დაგეგმვა
                        </a>
                        <a href="#services"
                           class="inline-flex items-center rounded-full border border-white/70 bg-white/5 px-6 py-2.5 text-xs font-medium uppercase tracking-[0.2em] text-slate-50 hover:bg-white/10 transition">
                            მომსახურებების ნახვა
                        </a>
                    </div>


                    <div class="mt-8 flex flex-wrap items-center gap-6 text-[0.7rem] uppercase tracking-[0.22em] text-slate-200/80">
                        <span id="hero-meta-1">{{ $first['meta1'] }}</span>
                        <span class="hidden sm:inline h-px w-8 bg-slate-200/50"></span>
                        <span id="hero-meta-2">{{ $first['meta2'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Let Laravel output slides as JSON for JS --}}
    <script type="application/json" id="hero-slides-data">
        {!! json_encode($slides) !!}
    </script>
</section>
@endif