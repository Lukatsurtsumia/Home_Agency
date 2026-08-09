<section id="services" class="py-28 bg-gradient-to-b from-[#f7f6f2] to-[#ece9e1]">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <p class="text-xs font-semibold tracking-[0.35em] uppercase text-slate-500">
               {{ __('ჩვენი სერვისები') }}
            </p>
            <h2 class="mt-4 text-2xl sm:text-3xl md:text-4xl font-semibold text-slate-900 break-words">
                 {{ __('სრულყოფილი გადაწყვეტილებები თქვენი უძრავი ქონებისთვის') }}
            </h2>
            <p class="mt-6 text-slate-600 text-sm leading-relaxed">
                {{ __('ბინის შეძენიდან და დიზაინის დაგეგმვიდან სრულ რემონტამდე — ყველა ეტაპი ერთი პროფესიონალური გუნდის კოორდინაციით.') }}
            </p>
        </div>
          <!-- CURRENCY SWITCH -->
<div class="mb-6 flex justify-center">
    <div class="bg-white border border-slate-200 rounded-2xl p-1 shadow-sm inline-flex">

        <button
            id="servicesGelBtn"
            type="button"
            class="currency-btn active-currency px-5 py-2 rounded-xl text-sm font-semibold transition-all duration-300">
            <span class="mr-1">₾</span>
            GEL
        </button>

        <button
            id="servicesUsdBtn"
            type="button"
            class="currency-btn px-5 py-2 rounded-xl text-sm font-semibold text-slate-500 hover:text-slate-900 transition-all duration-300">
            <span class="mr-1">$</span>
            USD
        </button>

    </div>
</div>
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
                <article class="service-card group relative min-h-[520px] overflow-hidden rounded-3xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">
            <img src="{{ asset($service['image']) }}"
     loading="lazy"
     class="absolute inset-0 w-full h-full object-cover brightness-50 transition duration-[1200ms] group-hover:scale-110">
                  <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-black/30 to-black/90"></div>

                    <div class="relative h-full flex flex-col p-8 text-white">
                        <span class="self-start mb-6 px-4 py-1 rounded-full {{ $service['badge_class'] }} text-xs font-semibold tracking-wider">
                            {{ __($service['badge']) }}
                        </span>

                        <p class="text-sm text-white/80 mb-6">
                            {{ __($service['description']) }}
                        </p>

                        <ul class="space-y-2 text-sm flex-1">
                            @foreach($service['features'] as $feature)
                                <li class="flex justify-between border-b border-white/20 py-2">
                                    <span>{{ __($feature['name']) }}</span>
                                 <span
    class="font-semibold service-feature-price"
    data-gel="{{ is_numeric($feature['price']) ? $feature['price'] : '' }}"
>
    {{ is_numeric($feature['price']) ? $feature['price'].' ₾' : __($feature['price']) }}
</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="pt-6 border-t border-white/20">
                        <p
    class="text-2xl font-semibold mb-4 service-price"
    data-gel="{{ is_numeric($service['priceM²']) ? $service['priceM²'] : '' }}"
    data-text="{{ !is_numeric($service['priceM²']) ? __($service['priceM²']) : '' }}"
>
    {{ is_numeric($service['priceM²']) ? $service['priceM²'].' ₾' : __($service['priceM²']) }}
</p>
                            <button
                            type="button"
                            onclick="{{ is_numeric($service['priceM²']) ? 'selectService('.$loop->index.')' : "document.getElementById('contact').scrollIntoView({behavior:'smooth',block:'start'})" }}"
                            class="w-full {{ $service['button_class'] }} text-white py-3 rounded-xl font-semibold transition cursor-pointer">
                                {{ __('აირჩიე') }}
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
<style>
    
    .active-currency{
        background:#0f172a;
        color:white !important;
    }
</style><script>
function selectService(serviceId)
{
    document.getElementById('calculator').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

    currentService = serviceId;

    packageButtons.forEach(btn => {

        btn.classList.remove('active-package');
        btn.classList.add('inactive-package');

        if (parseInt(btn.dataset.service) === currentService) {
            btn.classList.remove('inactive-package');
            btn.classList.add('active-package');
        }
    });

    renderMaterials();
    calculateTotals();
}

const servicesGelBtn = document.getElementById('servicesGelBtn');
const servicesUsdBtn = document.getElementById('servicesUsdBtn');

function updateServiceCurrencyButtons() {

    servicesGelBtn.classList.remove('active-currency', 'text-slate-500');
    servicesUsdBtn.classList.remove('active-currency', 'text-slate-500');

    if (currentCurrency === 'GEL') {

        servicesGelBtn.classList.add('active-currency');
        servicesUsdBtn.classList.add('text-slate-500');

    } else {

        servicesUsdBtn.classList.add('active-currency');
        servicesGelBtn.classList.add('text-slate-500');

    }
}

function updateServicePrices() {

    // Package Prices
    document.querySelectorAll('.service-price').forEach(el => {

        const textValue = el.dataset.text;

        // Premium / პერსონალური
        if (textValue) {
            el.innerText = textValue;
            return;
        }

        const gel = parseFloat(el.dataset.gel);

        if (currentCurrency === 'USD') {
            el.innerText = '$' + (gel / usdRate).toFixed(2);
        } else {
            el.innerText = gel + ' ₾';
        }

    });

    // Feature Prices
    document.querySelectorAll('.service-feature-price').forEach(el => {

        const gel = parseFloat(el.dataset.gel);

        // პერსონალური ფასები არ შეიცვალოს
        if (isNaN(gel)) {
            return;
        }

        if (currentCurrency === 'USD') {
            el.innerText = '$' + (gel / usdRate).toFixed(2);
        } else {
            el.innerText = gel + ' ₾';
        }

    });
}

servicesGelBtn.addEventListener('click', () => {

    currentCurrency = 'GEL';

    updateServiceCurrencyButtons();
    updateServicePrices();

    renderMaterials();
    calculateTotals();
});

servicesUsdBtn.addEventListener('click', () => {

    currentCurrency = 'USD';

    updateServiceCurrencyButtons();
    updateServicePrices();

    renderMaterials();
    calculateTotals();
});

// Initial state
currentCurrency = 'GEL';

updateServiceCurrencyButtons();
updateServicePrices();
</script>