<section id="calculator" class="bg-[#f6f4ef] py-16 sm:py-20 lg:py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 lg:mb-20">
          <p class="text-[0.68rem] tracking-[0.30em] text-slate-500 uppercase mb-4">
    {{ __('რემონტის კალკულატორი') }}
</p>

<h2 class="text-2xl sm:text-3xl lg:text-5xl font-semibold text-slate-900 leading-tight">
    {{ __('დაგეგმეთ თქვენი რემონტი ზუსტი და გამჭვირვალე ბიუჯეტით') }}
</h2>

<p class="mt-4 sm:mt-5 text-sm sm:text-base text-slate-500 leading-relaxed">
    {{ __('თანამედროვე კალკულატორი, რომელიც დაგეხმარებათ წინასწარ განსაზღვროთ პროექტის სავარაუდო ღირებულება, მასალების მოცულობა და დამატებითი მომსახურებები.') }}
</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-14 items-start">

            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-24">
                    <div class="bg-white rounded-3xl sm:rounded-[2rem] border border-slate-200 shadow-[0_18px_55px_rgba(15,23,42,0.06)] overflow-hidden">
                        <div class="p-4 sm:p-6 lg:p-7 space-y-7 sm:space-y-8">

                            <div>
                                <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-500 mb-4">
                                   {{ __('პაკეტები') }}
                                </p>
                                <div class="grid grid-cols-2 gap-2">
                                    <button class="package-btn active-package w-full min-h-16 px-3 py-3 rounded-2xl transition-all duration-300" data-service="0">
                                        <span class="block text-sm sm:text-[0.82rem] font-semibold">{{ __('საბაზო') }}</span>
                                        <span id="basicPackagePrice" class="block text-[0.72rem] sm:text-[0.68rem] opacity-70 mt-1">540 ₾ / მ²</span>
                                    </button>
                                    <button class="package-btn inactive-package w-full min-h-16 px-3 py-3 rounded-2xl transition-all duration-300" data-service="1">
                                        <span class="block text-sm sm:text-[0.82rem] font-semibold">{{ __('კომფორტი') }}</span>
                                        <span id="comfortPackagePrice" class="block text-[0.72rem] sm:text-[0.68rem] opacity-70 mt-1">850 ₾ / მ²</span>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-500">
                                        {{ __('ფართი') }}
                                    </p>
                                    <div class="flex items-center gap-1">
                                        <input
                                            id="sizeValueInput"
                                            type="number"
                                            min="10"
                                            max="200"
                                            step="0.5"
                                            value="50"
                                            inputmode="decimal"
                                            class="w-14 text-right text-base sm:text-lg font-semibold text-slate-900 bg-transparent border-b border-dashed border-slate-300 focus:border-slate-900 outline-none transition [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                        />
                                        <span class="text-base sm:text-lg font-semibold text-slate-900">მ²</span>
                                    </div>
                                </div>
                                <div>
                                    <input
                                        id="sizeSlider"
                                        type="range"
                                        min="10"
                                        max="200"
                                        step="0.5"
                                        value="50"
                                        class="native-slider w-full accent-slate-900"
                                    />
                                    <div class="flex justify-between mt-2 text-[0.68rem] text-slate-400">
                                        <span>10 მ²</span>
                                        <span>200 მ²</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-500">
                                        {{ __('კარები') }}
                                    </p>
                                    <p id="roomsValue" class="text-base sm:text-lg font-semibold text-slate-900">
                                        2
                                    </p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button
                                        id="roomMinus"
                                        class="w-12 h-12 rounded-2xl bg-slate-100 hover:bg-slate-200 transition text-lg font-semibold">
                                        -
                                    </button>
                                    <span id="roomsNumber" class="min-w-[28px] text-center font-semibold text-slate-900">2</span>
                                    <button
                                        id="roomPlus"
                                        class="w-12 h-12 rounded-2xl bg-slate-100 hover:bg-slate-200 transition text-lg font-semibold">
                                        +
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-500">
                                    {{ __('დამატებითი სერვისები') }}
                                </p>

                              <label class="extra-box flex items-center justify-between">
    <div>
        <p class="text-sm font-medium text-slate-800">{{ __('ავეჯისა და სამზარეულოს მონტაჟი') }}</p>
        <p id="furniturePrice" class="text-[0.72rem] text-slate-400 mt-1">
            7,000 ₾
        </p>
    </div>

    <input
        id="extraFurniture"
        type="checkbox"
        class="accent-slate-900 scale-110 shrink-0" />
</label>

                                <label class="extra-box flex items-center justify-between">
    <div>
        <p class="text-sm font-medium text-slate-800">{{ __('დამატებითი განათების სისტემა') }}</p>
        <p id="lightingPrice" class="text-[0.72rem] text-slate-400 mt-1">
            800 ₾
        </p>
    </div>

    <input
        id="extraLighting"
        type="checkbox"
        class="accent-slate-900 scale-110 shrink-0"
    />
</label>
                            </div>

                            <div class="bg-slate-950 rounded-3xl px-5 sm:px-7 py-6 sm:py-8">
                                <p class="text-[0.65rem] uppercase tracking-[0.20em] text-slate-400 mb-3">
                                  {{ __('სავარაუდო ღირებულება') }}
                                </p>
                                <div class="flex items-end gap-2 flex-wrap">
                                    <h2 id="totalPrice" class="text-2xl sm:text-3xl lg:text-4xl font-semibold tracking-tight text-white">0</h2>
                                </div>
                                <p id="totalPerM2" class="text-xs sm:text-sm text-slate-400 mt-2">0 ₾ / მ²</p>

                                <div class="mt-6 pt-6 border-t border-slate-800 space-y-3">
                                    <div class="flex items-center justify-between text-sm gap-4">
                                        <span class="text-slate-400">{{ __('სამუშაოს ღირებულება') }}</span>
                                        <span id="workCost" class="text-white font-medium whitespace-nowrap">0 ₾</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm gap-4">
                                        <span class="text-slate-400">{{ __('კარები') }}</span>
                                        <span id="doorsCost" class="text-white font-medium whitespace-nowrap">0 ₾</span>
                                    </div>
                                    <div id="calculatedMaterialsSection" class="space-y-3"></div>
                                    <div id="otherMaterialsSection" class="space-y-3"></div>
                                    <div id="extrasSection" class="space-y-3"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-8">
                <div class="mb-4 sm:mb-6 flex justify-center lg:justify-end">
                    <div class="bg-white border border-slate-200 rounded-2xl p-1 shadow-sm inline-flex w-full sm:w-auto">
                        <button
                            id="gelBtn"
                            type="button"
                            class="currency-btn active-currency flex-1 sm:flex-none px-5 py-3 rounded-xl text-sm font-semibold transition-all duration-300">
                            <span class="mr-1">₾</span>
                            GEL
                        </button>

                        <button
                            id="usdBtn"
                            type="button"
                            class="currency-btn flex-1 sm:flex-none px-5 py-3 rounded-xl text-sm font-semibold text-slate-500 hover:text-slate-900 transition-all duration-300">
                            <span class="mr-1">$</span>
                            USD
                        </button>
                    </div>
                </div>

                <section class="bg-white rounded-3xl sm:rounded-[2rem] border border-slate-200 shadow-[0_18px_55px_rgba(15,23,42,0.06)] overflow-hidden">
                    <div class="px-5 sm:px-7 py-5 sm:py-6 border-b border-slate-100">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div>
                                <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-400 mb-2">
                                    {{ __('მასალები') }}
                                </p>
                                <h2 class="text-lg sm:text-xl font-semibold text-slate-900">{{ __('მასალების რაოდენობის კორექტირება') }}</h2>
                            </div>
                            <div class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-2xl bg-slate-100">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                <span class="text-xs font-medium text-slate-600">{{ __('ცოცხალი კალკულაცია') }}</span>
                            </div>
                        </div>
                    </div>

                    <div id="materialsList" class="divide-y divide-slate-100"></div>

                    <div class="px-5 sm:px-7 py-5 bg-slate-50 border-t border-slate-100">
                        <div class="flex flex-col items-center text-center gap-2">
                            <p class="text-sm font-medium text-slate-700">
                                {{ __('საერთო მასალების ღირებულება') }}
                            </p>
                            <div class="flex items-start justify-center gap-1 leading-none">
                                <p id="materialsTotal" class="text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900">
                                    0
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="mt-6 flex justify-center">
                    <a
                        href="#contact"
                        class="inline-flex w-full sm:w-auto justify-center px-8 sm:px-10 py-3 rounded-xl bg-slate-900 text-white text-sm font-medium hover:bg-slate-800 transition">
                        {{ __('მოდი დავიწყოთ მოლაპარაკება') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto mt-12 sm:mt-14">
            <div class="bg-white text-slate-900 rounded-3xl sm:rounded-[2rem] border border-slate-200 shadow-[0_18px_55px_rgba(15,23,42,0.06)] overflow-hidden">
                <div class="px-5 sm:px-7 py-5 sm:py-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-[0.68rem] tracking-[0.24em] uppercase text-slate-400 mb-2">
                           {{ __('შეჯამება') }}
                        </p>
                        <h2 class="text-lg sm:text-xl font-semibold text-slate-900">
                            {{ __('სარემონტო პროექტის დეტალები') }}
                        </h2>
                    </div>
                    <button
                        id="exportPdfBtn"
                        class="flex items-center justify-center gap-2 px-5 py-3 bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition font-medium text-sm w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        PDF
                    </button>
                </div>

                <div class="p-5 sm:p-7" id="summaryContent">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
                        <div class="bg-slate-50 rounded-2xl p-5">
                            <p class="text-xs text-slate-500 uppercase tracking-wider mb-3">
                               {{ __('პროექტის დეტალები') }}
                            </p>
                            <div class="space-y-3">
                                <div class="flex justify-between gap-4">
                                    <span class="text-sm text-slate-600">{{ __('სერვისი') }}</span>
                                    <span id="summaryPackage" class="text-sm font-semibold text-slate-900"></span>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <span class="text-sm text-slate-600">{{ __('ზომა') }}</span>
                                    <span id="summarySize" class="text-sm font-semibold text-slate-900">50 მ²</span>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <span class="text-sm text-slate-600">{{ __('კარები') }}</span>
                                    <span id="summaryRooms" class="text-sm font-semibold text-slate-900">2</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-emerald-50 rounded-2xl p-5">
                            <p class="text-xs text-emerald-700 uppercase tracking-wider mb-3">
                                {{ __('საერთო ფასი') }}
                            </p>
                            <div class="flex items-end gap-2 flex-wrap">
                                <h3 id="summaryTotal" class="text-3xl font-bold text-emerald-900">
                                    0
                                </h3>
                            </div>
                            <p id="summaryPerM2" class="text-sm text-emerald-700 mt-2">
                                0 ₾ / მ²
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-wider">
                            {{ __('ღირებულების დაყოფა') }}
                        </h3>

                        <div class="border border-slate-200 rounded-2xl overflow-hidden">
                            <table class="w-full table-fixed">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th class="w-[52%] sm:w-[48%] px-3 sm:px-4 py-2.5 text-left text-[10px] sm:text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                            {{ __('დეტალები') }}
                                        </th>
                                        <th class="hidden xl:table-cell w-[14%] px-3 sm:px-4 py-2.5 text-right text-[10px] sm:text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                            {{ __('რაოდენობა') }}
                                        </th>
                                        <th class="w-[22%] sm:w-[20%] px-3 sm:px-4 py-2.5 text-right text-[10px] sm:text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                            {{ __('ღირებულება') }}
                                        </th>
                                        <th class="w-[26%] sm:w-[20%] px-3 sm:px-4 py-2.5 text-right text-[10px] sm:text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                            {{ __('ფასი') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="summaryTableBody" class="divide-y divide-slate-200"></tbody>
                            </table>
                        </div>

                        <div class="flex items-center justify-between gap-4 bg-slate-900 rounded-2xl px-5 py-4">
                            <span class="text-sm font-bold uppercase text-white">
                               {{ __('საერთო ფასი') }}
                            </span>
                            <span id="summaryGrandTotal" class="text-lg font-bold text-white whitespace-nowrap">
                                0 ₾
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    body {
        font-family: 'Noto Sans Georgian', sans-serif;
    }

    .active-currency {
        background: #0f172a;
        color: white !important;
    }

    .native-slider {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 6px;
        background: #e2e8f0;
        border-radius: 999px;
        outline: none;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .native-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 999px;
        background: #0f172a;
        border: 4px solid #fff;
        box-shadow: 0 2px 12px rgba(15,23,42,0.2);
        cursor: grab;
    }

    .native-slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 999px;
        background: #0f172a;
        border: 4px solid #fff;
        box-shadow: 0 2px 12px rgba(15,23,42,0.2);
        cursor: grab;
    }

  .active-package {
    background: #0f172a !important;
    color: white !important;
    border: 1px solid #0f172a !important;
}
    .inactive-package {
        @apply border border-slate-200 text-slate-800 rounded-2xl py-3 hover:border-slate-900 hover:bg-slate-50 transition-all duration-300;
    }

    .extra-box {
        @apply flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4 hover:border-slate-900 hover:bg-slate-50 transition cursor-pointer;
    }

    @media (max-width: 1024px) {
        #summaryTableBody tr td,
        #summaryTableBody tr th {
            padding-top: 0.55rem;
            padding-bottom: 0.55rem;
        }
    }

    @media (max-width: 640px) {
        .package-btn {
            min-height: 64px;
        }

        #summaryTableBody td:first-child {
            max-width: 0;
        }
    }
</style>

@php
    $calcNameMap = [];
    foreach ([
        'ლამინატი 10 მმ','პლინტუსი 7 მმ','შპალერი','კაფელ-მეტლახი','კარი','რადიატორი',
        'განათებები','უნიტაზი','აბაზანის აქსესუარები','ჩამრთველები','შავი მასალა',
        'საბაზო','კომფორტ','პრემიუმ','სამუშაოს ღირებულება','კარები',
        'ავეჯისა და სამზარეულოს მონტაჟი','დამატებითი განათების სისტემა','ავეჯის მონტაჟი','რაოდენობა',
    ] as $n) {
        $calcNameMap[$n] = __($n);
    }
@endphp
@push('scripts')
<script>
    // Display translations for material/service names. Logic keys stay Georgian;
    // only the visible text is translated via t().
    const NAME_T = @json($calcNameMap, JSON_UNESCAPED_UNICODE);
    function t(s) { return (NAME_T && NAME_T[s]) ? NAME_T[s] : s; }

    const services = [
        {
            id: 0,
            name: 'საბაზო',
            priceM2: 540,
            roomPrice: 400,
            calculatedMaterials: {
                'ლამინატი 10 მმ': 32,
                'პლინტუსი 7 მმ': 7,
                'შპალერი': 80,
                'კაფელ-მეტლახი': 40,
                'შავი მასალა': 120
                 
            },
            otherMaterials: {
                'რადიატორი': 25,
                'გათბობა': 800,
                'უნიტაზი': 300,
                'აბაზანის აქსესუარები': 800,
                'ჩამრთველები': 300,
            }
        },
        {
            id: 1,
            name: 'კომფორტი',
            priceM2: 850,
            roomPrice: 600,
            calculatedMaterials: {
                'ლამინატი 10 მმ': 42,
                'პლინტუსი 7 მმ': 17,
                'შპალერი': 120,
                'კაფელ-მეტლახი': 60,
                'შავი მასალა': 120
            },
            otherMaterials: {
                'რადიატორი': 42,
                'გათბობა': 800,
                'უნიტაზი': 800,
                'აბაზანის აქსესუარები': 1400,
                'ჩამრთველები': 500
            }
        },
    ];

    let currentCurrency = 'GEL';
    let usdRate = 2.75;
    let currentService = 0;
    let apartmentSize = 50;
    let rooms = 2;
     

    const materialSizes = {
        'ლამინატი 10 მმ': 45,
        'პლინტუსი 7 მმ': 25,
        'შპალერი': 16,
        'კაფელ-მეტლახი': 12,
        'შავი მასალა': 50
    };

    const materialDescriptions = {
        'ლამინატი 10 მმ': 'ძირითადი იატაკი ბინაში.',
        'პლინტუსი 7 მმ': 'იატაკის და კედლის შუალედის დაფარვა.',
        'შპალერი': 'კედლის დაფარვა.',
        'კაფელ-მეტლახი': 'აბაზანა + სამზარეულოს კაფელი.'
    };
    const materialUnits = {
    'ლამინატი 10 მმ': 'მ²',
    'პლინტუსი 7 მმ': 'გრძ/მ',
    'შპალერი': 'მ²',
    'კაფელ-მეტლახი': 'მ²',
    'შავი მასალა': 'მ²',

    'კარები': 'ც',
    'რადიატორი': 'ც',
    'გათბობა': 'ც',
    'უჟანგავი': 'ც',
    'აბაზანის აქსესუარები': 'ც',
    'ჩამრთველები': 'ც',
    'ავეჯისა და სამზარეულოს მონტაჟი': 'ც',
    'განათების სისტემა': 'ც'
};
   

    const materialsList = document.getElementById('materialsList');
    const materialsTotal = document.getElementById('materialsTotal');
    const totalPrice = document.getElementById('totalPrice');
    const totalPerM2 = document.getElementById('totalPerM2');
    const sizeSlider = document.getElementById('sizeSlider');
    const sizeValueInput = document.getElementById('sizeValueInput');
    const packageButtons = document.querySelectorAll('.package-btn');

    function updateAutoSizes() {
        materialSizes['ლამინატი 10 მმ'] = +(apartmentSize * 0.9).toFixed(1);
        materialSizes['პლინტუსი 7 მმ'] = +(apartmentSize / 2).toFixed(1);
        materialSizes['შპალერი'] = +(apartmentSize / 3).toFixed(1);
        materialSizes['კაფელ-მეტლახი'] = +(apartmentSize * 0.35).toFixed(1);
        materialSizes['შავი მასალა'] = +apartmentSize.toFixed(1);
    }

    async function loadUsdRate() {
        try {
            // Same-origin endpoint: the server fetches NBG (cached) so the browser
            // never calls nbg.gov.ge directly (no DNS/CORS failures).
            const res = await fetch('{{ route('usd.rate') }}');
            const data = await res.json();
            if (data.rate) {
                usdRate = data.rate;
                calculateTotals();
            }
        } catch (e) {
            console.log('USD rate failed, using fallback');
        }
    }

    function money(value) {
        if (currentCurrency === 'USD') {
            return Number(value / usdRate).toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + ' $';
        }
        return Number(value).toLocaleString() + ' ₾';
    }

    function updatePackagePrices() {
        const basic = services[0].priceM2;
        const comfort = services[1].priceM2;

        if (currentCurrency === 'USD') {
            document.getElementById('basicPackagePrice').innerText = '$' + (basic / usdRate).toFixed(2) + ' / m²';
            document.getElementById('comfortPackagePrice').innerText = '$' + (comfort / usdRate).toFixed(2) + ' / m²';
        } else {
            document.getElementById('basicPackagePrice').innerText = basic + ' ₾ / მ²';
            document.getElementById('comfortPackagePrice').innerText = comfort + ' ₾ / მ²';
        }
    }

    function updateExtrasPrices() {
        const furniture = document.getElementById('furniturePrice');
        const lighting = document.getElementById('lightingPrice');
        if (furniture) furniture.innerText = money(7000);
        if (lighting) lighting.innerText = money(800);
    }

    function updateCurrencyButtons() {
        const gelBtn = document.getElementById('gelBtn');
        const usdBtn = document.getElementById('usdBtn');
        gelBtn.classList.remove('active-currency');
        usdBtn.classList.remove('active-currency');

        if (currentCurrency === 'GEL') {
            gelBtn.classList.add('active-currency');
        } else {
            usdBtn.classList.add('active-currency');
        }
    }
 
    function renderMaterials() {
        const service = services[currentService];
        materialsList.innerHTML = '';

        Object.keys(service.calculatedMaterials).forEach(materialName => {
            if (materialName === 'შავი მასალა') return;

            const price = service.calculatedMaterials[materialName];
            const currentSize = materialSizes[materialName];
            const total = Math.round(price * currentSize);
            const safeId = materialName.replace(/\s/g, '-').replace(/მმ/g, 'mm');

            materialsList.innerHTML += `
                <div class="px-5 sm:px-7 py-5 sm:py-6">
                    <div class="flex flex-col gap-5">
                        <div class="flex items-start justify-between gap-5">
                            <div class="min-w-0 flex-1">
                                <h3 class="text-sm font-semibold text-slate-900">${t(materialName)}</h3>
                              <p class="text-[0.72rem] text-slate-400 mt-1">
    ${money(price)} / ${materialName === 'პლინტუსი 7 მმ' ? 'გრძ/მ' : 'მ²'}
</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-base font-semibold tracking-tight text-slate-900" id="total-${safeId}">${money(total)}</p>
    <p class="text-[0.72rem] text-slate-400 mt-1">
    <span id="size-${safeId}">${currentSize.toFixed(1)}</span>
    ${materialName === 'პლინტუსი 7 მმ' ? 'გრძ/მ' : 'მ²'}
</p>
                            </div>
                        </div>

                        <div>
                            <input
                                type="range"
                                min="0"
                                max="200"
                                step="0.5"
                                value="${currentSize}"
                                data-material="${materialName}"
                                id="slider-${safeId}"
                                class="material-slider native-slider w-full accent-slate-900">
                           <div class="flex justify-between mt-2 text-[0.68rem] text-slate-400">
    <span>0 ${materialName === 'პლინტუსი 7 მმ' ? 'გრძ/მ' : 'მ²'}</span>
    <span>200 ${materialName === 'პლინტუსი 7 მმ' ? 'გრძ/მ' : 'მ²'}</span>
</div>
                        </div>

                        <p class="text-sm text-slate-400 leading-relaxed" id="desc-${safeId}">
                            ${materialDescriptions[materialName] ?? ''}
                        </p>
                    </div>
                </div>
            `;
        });

        attachMaterialSliderEvents();
    }

    function attachMaterialSliderEvents() {
        document.querySelectorAll('.material-slider').forEach(slider => {
            slider.addEventListener('input', (e) => {
                const materialName = e.target.dataset.material;
                const value = parseFloat(e.target.value);
                materialSizes[materialName] = value;
                updateSingleMaterialDisplay(materialName, value);
                calculateTotals();
            });
        });
    }

 function updateSingleMaterialDisplay(materialName, value) {
    const service = services[currentService];
    const price = service.calculatedMaterials[materialName];
    const total = Math.round(price * value);

    const unit = materialName === 'პლინტუსი 7 მმ'
        ? 'გრძ/მ'
        : 'მ²';

    const safeId = materialName.replace(/\s/g, '-').replace(/მმ/g, 'mm');

    const sizeEl = document.getElementById(`size-${safeId}`);
    const totalEl = document.getElementById(`total-${safeId}`);
    const descEl = document.getElementById(`desc-${safeId}`);

    if (sizeEl) sizeEl.innerText = value.toFixed(1);
    if (totalEl) totalEl.innerText = money(total);

    if (descEl && materialDescriptions[materialName]) {
        descEl.innerHTML =
            `${materialDescriptions[materialName]} (${value.toFixed(1)} ${unit} × ${money(price)})`;
    }
}
    function updateAllMaterialDisplays() {
        Object.keys(materialSizes).forEach(materialName => {
            const value = materialSizes[materialName];
            const safeId = materialName.replace(/\s/g, '-').replace(/მმ/g, 'mm');
            const slider = document.getElementById(`slider-${safeId}`);
            if (slider) slider.value = value;
            updateSingleMaterialDisplay(materialName, value);
        });
    }

    function calculateTotals() {
        const service = services[currentService];

        let materialsSum = 0;
        let calculatedMaterialsHTML = '';
        let summaryRows = [];

        Object.keys(service.calculatedMaterials).forEach(materialName => {
            const price = Number(service.calculatedMaterials[materialName]) || 0;
            const currentSize = Number(materialSizes[materialName]) || 0;
            const total = Math.round(price * currentSize);

            materialsSum += total;
 const unit = materialUnits[materialName] || '';

            calculatedMaterialsHTML += `
                <div class="flex items-center justify-between text-sm gap-4">
    
<span class="text-slate-400">
    ${t(materialName)} ${currentSize.toFixed(1)} ${unit}
</span>
                    <span class="text-white font-medium whitespace-nowrap">${money(total)}</span>
                </div>
            `;

            summaryRows.push({
                name: materialName,
                quantity: currentSize.toFixed(1) ,
                price: money(price),
                total: money(total)
            });
        });

        materialsTotal.innerText = money(materialsSum);
        document.getElementById('calculatedMaterialsSection').innerHTML = calculatedMaterialsHTML;

        const workCalc = Math.round(apartmentSize * service.priceM2);
        document.getElementById('workCost').innerText = money(workCalc);

        summaryRows.unshift({
            name: 'სამუშაოს ღირებულება',
            quantity: apartmentSize.toFixed(1) ,
            price: money(service.priceM2),
            total: money(workCalc)
        });

     const roomCost = rooms * service.roomPrice;
        document.getElementById('doorsCost').innerText = money(roomCost);
        summaryRows.push({
            name: 'კარები',
            quantity: rooms,
            price: money(service.roomPrice),
            total: money(roomCost)
        });

        let otherMaterialsHTML = '';
        let otherMaterialsTotal = 0;

        Object.keys(service.otherMaterials).forEach(materialName => {
            const price = Number(service.otherMaterials[materialName]) || 0;
            let lineTotal = price;
            let quantityText = '1';

            if (materialName === 'რადიატორი') {
                const qty = apartmentSize / 2;
                lineTotal = Math.round(qty * price);
                quantityText = qty.toFixed(1) + ' ც (მ²/2)';
            }

            otherMaterialsTotal += lineTotal;

            otherMaterialsHTML += `
                <div class="flex items-center justify-between text-sm gap-4">
                    <span class="text-slate-400">${t(materialName)}</span>
                    <span class="text-white font-medium whitespace-nowrap">${money(lineTotal)}</span>
                </div>
            `;

            summaryRows.push({
                name: materialName,
                quantity: quantityText,
                price: money(price),
                total: money(lineTotal)
            });
        });

        document.getElementById('otherMaterialsSection').innerHTML = otherMaterialsHTML;

        let extras = 0;
        let extrasHTML = '';

        if (document.getElementById('extraFurniture').checked) {
            extras += 7000;
            extrasHTML += `
                <div class="flex items-center justify-between text-sm gap-4">
                    <span class="text-slate-400">${t('ავეჯის მონტაჟი')}</span>
                    <span class="text-white font-medium whitespace-nowrap">${money(7000)}</span>
                </div>
            `;
            summaryRows.push({
                name: 'ავეჯისა და სამზარეულოს მონტაჟი',
                quantity: '1',
                price: money(7000),
                total: money(7000)
            });
        }

        if (document.getElementById('extraLighting').checked) {
            extras += 800;
            extrasHTML += `
                <div class="flex items-center justify-between text-sm gap-4">
                    <span class="text-slate-400">${t('დამატებითი განათების სისტემა')}</span>
                    <span class="text-white font-medium whitespace-nowrap">${money(800)}</span>
                </div>
            `;
            summaryRows.push({
                name: 'დამატებითი განათების სისტემა',
                quantity: '1',
                price: money(800),
                total: money(800)
            });
        }

        document.getElementById('extrasSection').innerHTML = extrasHTML;

        const finalTotal = workCalc + roomCost + materialsSum + otherMaterialsTotal + extras;

        window.pdfSummary = {
            package: t(service.name),
            size: apartmentSize,
            rooms: rooms,
            total: finalTotal,
            totalFormatted: currentCurrency === 'USD' ? '$' + (finalTotal / usdRate).toFixed(2) : Number(finalTotal).toLocaleString() + ' GEL',
            currency: currentCurrency,
            rows: summaryRows.map(row => ({
                name: t(row.name),
                quantity: row.quantity,
                 unit: materialUnits[row.name] || '',
                priceRaw: currentCurrency === 'USD' ? row.price : row.price.replaceAll('₾', ' GEL'),
                totalRaw: currentCurrency === 'USD' ? row.total : row.total.replaceAll('₾', ' GEL')
            }))
        };

        totalPrice.innerText = money(finalTotal);
        totalPerM2.innerText = money(finalTotal / apartmentSize) + ' / მ²';
        document.getElementById('summaryPackage').innerText = t(service.name);
        document.getElementById('summarySize').innerText = apartmentSize.toFixed(1) + ' მ²';
        document.getElementById('summaryRooms').innerText = rooms;
        document.getElementById('summaryTotal').innerText = money(finalTotal);
        document.getElementById('summaryPerM2').innerText = money(finalTotal / apartmentSize) + ' / მ²';
        document.getElementById('summaryGrandTotal').innerText = money(finalTotal);

 let tableHTML = '';

summaryRows.forEach(row => {

    const unit = materialUnits[row.name] || 'მ²';

    tableHTML += `
        <tr class="hover:bg-slate-50">
            <td class="px-3 sm:px-4 py-2.5 text-sm text-slate-900 align-top">
                <div class="truncate max-w-full">${t(row.name)}</div>
                <div class="xl:hidden text-[11px] text-slate-400 mt-1 truncate">
                   ${t('რაოდენობა')}: ${row.quantity} ${materialUnits[row.name] || 'მ²'}
                </div>
            </td>

            <td class="hidden xl:table-cell px-3 sm:px-4 py-2.5 text-sm text-slate-600 text-right whitespace-nowrap">
                ${row.quantity} ${unit}
            </td>

            <td class="px-3 sm:px-4 py-2.5 text-sm text-slate-600 text-right whitespace-nowrap">
                ${row.price}
            </td>

            <td class="px-3 sm:px-4 py-2.5 text-sm font-semibold text-slate-900 text-right whitespace-nowrap">
                ${row.total}
            </td>
        </tr>
    `;
});
        document.getElementById('summaryTableBody').innerHTML = tableHTML;
    }

    document.getElementById('extraFurniture').addEventListener('change', calculateTotals);
    document.getElementById('extraLighting').addEventListener('change', calculateTotals);

    document.getElementById('gelBtn').addEventListener('click', () => {
        currentCurrency = 'GEL';
        updateCurrencyButtons();
        updatePackagePrices();
        renderMaterials();
        updateExtrasPrices();
        calculateTotals();
    });

    document.getElementById('usdBtn').addEventListener('click', () => {
        currentCurrency = 'USD';
        updateCurrencyButtons();
        updatePackagePrices();
        renderMaterials();
        updateExtrasPrices();
        calculateTotals();
    });

    function applySizeChange() {
        updateAutoSizes();
        updateAllMaterialDisplays();
        calculateTotals();
    }

    sizeSlider.addEventListener('input', (e) => {
        apartmentSize = parseFloat(e.target.value);
        sizeValueInput.value = apartmentSize.toFixed(1);
        applySizeChange();
    });

    sizeValueInput.addEventListener('input', (e) => {
        const value = parseFloat(e.target.value);
        if (isNaN(value)) return;
        apartmentSize = value;
        sizeSlider.value = Math.min(200, Math.max(10, value));
        applySizeChange();
    });

    sizeValueInput.addEventListener('change', (e) => {
        const clamped = Math.min(200, Math.max(10, parseFloat(e.target.value) || apartmentSize));
        apartmentSize = clamped;
        e.target.value = clamped.toFixed(1);
        sizeSlider.value = clamped;
        applySizeChange();
    });

    packageButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            packageButtons.forEach(b => {
                b.classList.remove('active-package');
                b.classList.add('inactive-package');
            });
            btn.classList.remove('inactive-package');
            btn.classList.add('active-package');
            currentService = parseInt(btn.dataset.service);
            renderMaterials();
            calculateTotals();
        });
    });

    document.getElementById('roomMinus').addEventListener('click', () => {
        if (rooms > 1) {
            rooms--;
            document.getElementById('roomsValue').innerText = rooms;
            document.getElementById('roomsNumber').innerText = rooms;
            calculateTotals();
        }
    });

    document.getElementById('roomPlus').addEventListener('click', () => {
        if (rooms < 10) {
            rooms++;
            document.getElementById('roomsValue').innerText = rooms;
            document.getElementById('roomsNumber').innerText = rooms;
            calculateTotals();
        }
    });

    document.getElementById('exportPdfBtn').addEventListener('click', async () => {
        const response = await fetch('/generate-pdf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(window.pdfSummary)
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.log(errorText);
            document.body.innerHTML = errorText;
            return;
        }

        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'renovation-summary.pdf';
        document.body.appendChild(a);
        a.click();
        a.remove();
        window.URL.revokeObjectURL(url);
    });
 loadUsdRate();
    updateAutoSizes();
    renderMaterials();
    updatePackagePrices();
    updateExtrasPrices();
    calculateTotals();
</script>
@endpush