@extends('layouts.main')

@section('content')
<section class="bg-slate-950 min-h-screen flex items-center py-16">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <h1 class="text-white text-3xl font-semibold mb-10 text-center">
            პორტფოლიო
        </h1>

       <div x-data="portfolioGallery()" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- LEFT: BIG IMAGE + THUMBNAILS (70% on large) -->
    <div class="space-y-6 lg:col-span-8">
        <!-- MAIN IMAGE -->
        <div class="relative group">
          <img
        :src="images[currentIndex]"
        class="w-full h-[520px] object-contain rounded-3xl"
    >
            <button 
                @click="prevImage"
                class="absolute left-3 lg:left-4 top-1/2 -translate-y-1/2
                bg-black/60 hover:bg-black text-white
                w-9 h-9 lg:w-11 lg:h-11 rounded-full flex items-center justify-center text-lg">
                ‹
            </button>

            <button 
                @click="nextImage"
                class="absolute right-3 lg:right-4 top-1/2 -translate-y-1/2
                bg-black/60 hover:bg-black text-white
                w-9 h-9 lg:w-11 lg:h-11 rounded-full flex items-center justify-center text-lg">
                ›
            </button>
        </div>

        <!-- THUMBNAILS -->
        <div class="overflow-x-auto pb-2">
            <div class="flex gap-3 min-w-max">
                @foreach($portfolio->images as $index => $image)
                    <img
                        src="{{ asset('storage/'.$image->image) }}"
                        @click="setImage({{ $index }})"
                        :class="currentIndex == {{ $index }} ? 'border-sky-500 scale-105' : 'border-slate-700'"
                        class="w-20 h-16 md:w-24 md:h-20 object-cover rounded-lg cursor-pointer border-2 transition hover:scale-105 flex-shrink-0"
                    >
                @endforeach
            </div>
        </div>
    </div>

    <!-- RIGHT: DESCRIPTION (30% on large) -->
    <div class="text-slate-300 space-y-6 lg:col-span-4">
        <h2 class="text-white text-2xl font-semibold">
            {{ $portfolio->title }}
        </h2>

        <p class="text-slate-400 leading-relaxed">
            {{ $portfolio->description ?? 'A carefully designed interior renovation project focused on modern aesthetics, functionality and comfortable living spaces.' }}
        </p>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between border-b border-slate-800 pb-2">
                <span class="text-slate-400">პროექტის ტიპი</span>
                <span class="text-white">ინტერიერის რემონტი</span>
            </div>

            <div class="flex justify-between border-b border-slate-800 pb-2">
                <span class="text-slate-400">ფართობი</span>
                <span class="text-white">{{ $portfolio->area ?? '120' }} m²</span>
            </div>

            <div class="flex justify-between border-b border-slate-800 pb-2">
                <span class="text-slate-400">ლოკაცია</span>
                <span class="text-white">{{ $portfolio->location ?? 'თბილისი' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-slate-400">დასრულება</span>
                <span class="text-white">2026</span>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<script>
function portfolioGallery() {
    return {
        currentIndex: 0,
        images: [
            @foreach($portfolio->images as $image)
                "{{ asset('storage/'.$image->image) }}",
            @endforeach
        ],
        nextImage() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length
        },
        prevImage() {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length
        },
        setImage(i) {
            this.currentIndex = i
        }
    }
}
</script>
@endsection