# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project overview

Home Agency (GaGo Agency) is a Laravel 13 marketing/lead-gen site for a Georgian renovation company. It's Blade + Alpine.js + Tailwind CSS (no SPA framework). All customer-facing copy is in Georgian. Core flows: landing page with hero slideshow and service packages, an interactive renovation cost calculator that generates a downloadable PDF summary, a portfolio showcase (with an interactive Leaflet map of completed projects), and a contact form that emails both the agency and an auto-reply to the client.

## Commands

- `composer run dev` — runs the full local dev stack concurrently: `php artisan serve`, `queue:listen`, `php artisan pail` (log tailing), and `npm run dev` (Vite). This is the normal way to run the app locally.
- `npm run dev` / `npm run build` — Vite only (JS/CSS).
- `composer run test` or `php artisan test` — run the full test suite (Pest). Clears config cache first.
- Single test: `php artisan test --filter=TestName` or `./vendor/bin/pest tests/Feature/Auth/AuthenticationTest.php`.
- `vendor/bin/pint` — code style fixer (Laravel Pint).
- `php artisan migrate` — DB uses SQLite (`database/database.sqlite`) by default; tests use an in-memory `testing` DB config (see `phpunit.xml`).
- `php artisan db:seed` — seeds a single admin user from `ADMIN_EMAIL`/`ADMIN_PASSWORD` env vars (see `database/seeders/DatabaseSeeder.php`). There is no factory-based demo data seeding.

## Architecture

**Routing** (`routes/web.php`, `routes/auth.php`): all portfolio-mutating routes (`create`, `store`, `edit`, `update`) are behind `auth` middleware — there's no admin role/permission system, just "logged in or not". Auth scaffolding is Laravel Breeze (Blade stack).

**Portfolio domain** (`app/Models/portfolio.php`, `portfolioImage.php`, `PortfolioController`): a `portfolio` has one `cover_image` plus many `portfolioImage` gallery images, both stored via the `public` disk under `storage/app/public/portfolio/{id}/...` (remember to `php artisan storage:link`, already reflected in `public/storage`). Portfolios optionally carry `lat`/`lng` for map display — `MainController::index` filters portfolios to those with both set for the "sold apartments" map data passed to the view. Note the model class names are lowercase (`portfolio`, `portfolioImage`), not PSR-conventional — keep this in mind when referencing them (`App\Models\portfolio::class`).

**Landing page** (`MainController::index` → `resources/views/page/index.blade.php`): assembles hero slides, service package pricing tiers (`priceM²` + itemized `features`), and portfolio/map data as plain PHP arrays directly in the controller and passes them to Blade partials under `resources/views/website/*` (`slide-show`, `services`, `calculator`, `map`, `portfolio`, `about`, `contact`). There's no CMS — copy and pricing changes are made directly in `MainController.php`.

**Renovation calculator** (`resources/views/website/calculator.blade.php`, ~900 lines of Alpine.js): client-side cost calculation with GEL (₾) → USD conversion, itemized material/service breakdown, and a "Generate PDF" action that POSTs the computed rows/totals as JSON to `/generate-pdf`.

**PDF generation** (`PdfController` + `resources/views/pdf/summary.blade.php`, via `barryvdh/laravel-dompdf`): receives the calculator's raw request payload (not validated/typed — `$request->all()`), replaces currency symbols (₾/$) with plain-text equivalents (dompdf/its fonts don't render them reliably), and renders/downloads a PDF. Custom fonts for Georgian text are pre-registered in `storage/fonts/` (`NotoSansGeorgian*`, referenced via `storage/fonts/installed-fonts.json`).

**Contact form** (`ContactController::send`): sends two raw inline-HTML emails via `Mail::send`/`Mail::html` (no Mailable classes, no queueing) — one notification to the agency inbox (hardcoded `GaGoAgency0@gmail.com`), one auto-reply to the submitter. If adding new transactional email, prefer converting to proper Mailable classes rather than extending the inline-HTML pattern.

**Map integration** (`resources/js/app.js`, Leaflet + MapTiler): renders sold-apartment markers bounded to the Tbilisi area; the MapTiler API key is currently hardcoded client-side in `app.js`.

**Frontend build**: Tailwind CSS v4 via the Vite plugin (`@tailwindcss/vite`, no separate `tailwind.config.js` content globbing needed beyond what's declared), Alpine.js for interactivity, no bundler-driven component framework — most JS lives directly in `resources/js/app.js` as DOMContentLoaded-scoped listeners plus inline Alpine data in the Blade views themselves.
