<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CurrencyController;
Route::get('/', [MainController::class, 'index'])->name('welcome') ;

Route::get('/usd-rate', [CurrencyController::class, 'usdRate'])->name('usd.rate');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, \App\Http\Middleware\SetLocale::SUPPORTED, true)) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index') ;
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('images') ;
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send') ;

Route::post('/generate-pdf', [PdfController::class, 'generate'])->name('generate.pdf');
Route::middleware('auth')->group(function () {

    Route::post('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
