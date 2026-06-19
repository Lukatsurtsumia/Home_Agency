 
<section id="contact" class="py-20 bg-slate-950 scroll-mt-32 section-fade" data-section-fade>
    <div class="max-w-5xl mx-auto px-4 space-y-10">
        {{-- Top heading --}}
        <div class="space-y-3 text-center">
            <p class="text-[11px] uppercase tracking-[0.25em] text-sky-400">
                დაგვიკავშირდით
            </p>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white">
             უძრავი ქონება და სრული რემონტი — ერთი სანდო პარტნიორისგან
            </h2>
            <p class="text-sm text-slate-300 max-w-2xl mx-auto">
            გთავაზობთ სრულ მომსახურებას ბინის შერჩევიდან, შეძენიდან და რემონტის დაგეგმვიდან
    სრულად დასრულებული საცხოვრებელი სივრცის ჩაბარებამდე. მოგვწერეთ და
    სიამოვნებით დაგეხმარებით თქვენი პროექტის განხორციელებაში.
            </p>
        </div>

        {{-- Main card --}}
        <div class="bg-slate-900/95 border border-slate-800/80 rounded-3xl px-6 py-7 sm:px-9 sm:py-9 shadow-[0_28px_80px_rgba(15,23,42,0.85)]">
            <div class="flex flex-col md:flex-row gap-8 md:gap-10">
                {{-- LEFT: profile --}}
                <div class="md:w-5/12 flex flex-col gap-5">
                    <div class="flex items-center gap-4">
                       <div class="relative w-20 h-20 rounded-full bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center border border-slate-600">
    <svg
        class="w-12 h-12 text-white"
        viewBox="0 0 180 180"
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
</div>
                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-white">
                                GaGo Agency 
                            </p>
                            <p class="text-[11px] text-slate-400">
                                უძრავი ქონება • დიზაინი • სრული რემონტი
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-[11px] text-slate-400">Email</p>
                            <a href="mailto:GaGoAgency0@gmail.com" class="text-sky-300 hover:text-sky-200">
                                GaGoAgency0@gmail.com
                            </a>
                        </div>
                        <div>
                            <p class="text-[11px] text-slate-400">Phone / WhatsApp</p>
                            <a href="tel:+995000000000" class="text-sky-300 hover:text-sky-200">
                                +995 00 000 00 00
                            </a>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p class="text-[11px] text-slate-400">
    ჩვენი მომსახურება თქვენთვისაა, თუ:
</p>

<ul class="text-[11px] text-slate-300 space-y-1">
    <li>• ეძებთ უძრავ ქონებას სანდო მხარდაჭერით.</li>
    <li>• გსურთ ხარისხიანი და ორგანიზებული რემონტი.</li>
    <li>• გირჩევნიათ ყველა პროცესი ერთმა გუნდმა მართოს.</li>
</ul>
                    </div>

                    <p class="text-[11px] text-slate-500">
                      შეგიძლიათ მოგვწეროთ ქართულად ან ინგლისურად. როგორც წესი, პასუხს ერთი სამუშაო დღის განმავლობაში მიიღებთ.
                    </p>
                </div>

                {{-- RIGHT: form --}}
                <div class="md:w-7/12 space-y-4">
                    <div>
                        <p class="text-sm font-semibold text-white">
                            გამოგვიგზავნეთ შეტყობინება
                        </p>
                        <p class="text-[12px] text-slate-400">
                             მოგვწერეთ თქვენი მოთხოვნების შესახებ და ჩვენი გუნდი დაგიკავშირდებათ შესაბამისი შეთავაზებით.
                        </p>
                    </div>

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                        @csrf
                        {{-- -Success Message --}}
                        @if (session('success'))
    <div class="rounded-2xl bg-emerald-500/10 border border-emerald-500/30 px-4 py-3 text-sm text-emerald-300">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="rounded-2xl bg-red-500/10 border border-red-500/30 px-4 py-3 text-sm text-red-300">
        {{ session('error') }}
    </div>
@endif
                        {{-- later: @csrf and real action --}}
                        <div class="grid gap-3 sm:grid-cols-2">
                            <div>
                                <label class="block text-[12px] text-slate-300 mb-1.5">სახელი და გვარი</label>
                                <input
                                    type="text"
                                    name="sender_name"
                                    class="w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                                    placeholder="Your name"
                                >
                                @error('sender_name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[12px] text-slate-300 mb-1.5">ელ. ფოსტა</label>
                                <input
                                    type="email"
                                    name="sender_email"
                                    class="w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                                    placeholder="you@example.com / +995..."
                                >
                                @error('sender_email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-[12px] text-slate-300 mb-1.5">შეტყობინება</label>
                            <textarea
                                name="sender_message"
                                rows="4"
                                class="w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                                placeholder="Example: 2–3 rooms in Saburtalo or Vake, budget around X, for living / for rental."
                            ></textarea>
                            @error('sender_message') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex justify-end pt-1">
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-sky-500 px-7 py-2.5 text-sm font-semibold text-white hover:bg-sky-400 active:bg-sky-600 transition shadow-md shadow-sky-900/40"
                            >
                                შეტყობინების გაგზავნა
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($errors->has('sender_name') || $errors->has('sender_email') || $errors->has('sender_message') || session('success') || session('error'))
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
    });
</script>
@endif