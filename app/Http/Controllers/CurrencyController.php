<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    /**
     * USD → GEL rate (GEL per 1 USD).
     *
     * Fetched from the National Bank of Georgia on the server and cached for
     * 6 hours, so visitors' browsers never call nbg.gov.ge directly. That
     * avoids the DNS / CORS failures the client-side fetch used to hit, and
     * keeps a durable "last good" rate as a fallback if NBG is unreachable.
     */
    public function usdRate()
    {
        $rate = Cache::get('nbg_usd_rate');

        if (! $rate) {
            $rate = $this->fetchNbgUsdRate();

            if ($rate) {
                Cache::put('nbg_usd_rate', $rate, now()->addHours(6)); // fresh rate
                Cache::forever('nbg_usd_rate_last_good', $rate);       // durable fallback
            } else {
                // NBG unreachable: use the last known good rate, else a sane default
                $rate = Cache::get('nbg_usd_rate_last_good', 2.75);
            }
        }

        return response()->json(['rate' => (float) $rate]);
    }

    private function fetchNbgUsdRate(): ?float
    {
        try {
            $res = Http::timeout(8)
                ->get('https://nbg.gov.ge/gw/api/ct/monetarypolicy/currencies/en/json');

            if ($res->successful()) {
                foreach (data_get($res->json(), '0.currencies', []) as $c) {
                    if (($c['code'] ?? null) === 'USD' && ! empty($c['rate'])) {
                        return (float) $c['rate'];
                    }
                }
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return null;
    }
}
