<section id="sold" class="py-16 sm:py-20 bg-[#f5f3ef]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 sm:mb-12 text-center">
            <p class="text-[0.7rem] font-medium uppercase tracking-[0.3em] text-slate-500">
              განხორციელებული პროექტები
            </p>
            <h2 class="mt-3 text-2xl sm:text-3xl md:text-4xl font-semibold tracking-tight text-slate-900">
              ლოკაციები, სადაც ჩვენი დახმარებით უძრავი ქონება წარმატებით გაიყიდა
            </h2>
            <p class="mt-4 text-sm sm:text-base text-slate-600 max-w-2xl mx-auto">
              თბილისში  განხორციელებული პროექტები. აირჩიეთ მისამართი, რათა რუკაზე იხილოთ მისი სავარაუდო მდებარეობა.
            </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-[1.1fr,0.9fr] items-start">
            {{-- Map --}}
            <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-slate-100 shadow-sm">
                <div id="sold-map" class="h-72 sm:h-80 md:h-96"></div>
            </div>

            {{-- List --}}
            <div class="space-y-4">
                <p class="text-[0.75rem] font-medium uppercase tracking-[0.26em] text-slate-500">
                    გაყიდული ობიექტების სია
                </p>
                <ul class="space-y-3 text-sm sm:text-base text-slate-800">
                    @foreach($soldApartments as $apartment)
                        <li
                            class="group flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200/70 bg-white px-4 py-3 hover:border-slate-900 hover:bg-slate-900 hover:text-[#f5f3ef] transition"
                            data-apartment-id="{{ $apartment['id'] }}"
                        >
                            <div class="mt-1 flex h-7 w-7 items-center justify-center rounded-full bg-slate-900 text-[0.8rem] font-semibold text-[#f5f3ef] group-hover:bg-[#f5f3ef] group-hover:text-slate-900 transition">
                             {{ $loop->iteration }}
                            </div>
                            <div>
                                <p class="font-semibold">{{ $apartment['title'] }}</p>
                                <p class="text-xs sm:text-[0.8rem] text-slate-500 group-hover:text-slate-200">
                                    {{ $apartment['address'] }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Pass data to JS --}}
    <script type="application/json" id="sold-apartments-data">
        {!! json_encode($soldApartments) !!}
    </script>
</section>