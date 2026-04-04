# Tech Stack

## Production Stack

| Layer | Technology | Version |
|-------|-----------|---------|
| Backend | Laravel | ^12 |
| Language | PHP | ^8.4 |
| Frontend | Blade templates | (Laravel built-in) |
| CSS | Tailwind CSS | ^3.4.1 |
| JS | Vanilla (no framework) | — |
| Bundler | Vite | ^4.0.0 |
| Hosting | Laravel Forge | — |
| Domain | slaty.dev | — |

## Dev Dependencies

| Package | Purpose |
|---------|---------|
| `laravel-vite-plugin` | Connects Vite to Laravel's asset pipeline |
| `autoprefixer` | PostCSS plugin for CSS vendor prefixes |
| `laravel/pint` | PHP code style (PSR-12) |
| `laravel/sail` | Docker dev environment (optional) |
| `phpunit/phpunit ^11` | Testing |
| `nunomaduro/collision` | Pretty test output |
| `spatie/laravel-ignition` | Error pages in development |

## What Was Removed

This site was previously built with **Inertia.js + Vue 3 + Breeze** (auth scaffolding) and a **Satisfactory game server integration**. All of that has been stripped in the `topic/improvements` rebuild:

- Removed `@inertiajs/vue3`, `vue`, `@vitejs/plugin-vue`
- Removed `laravel/breeze`, Sanctum, Ziggy
- Removed `SatisfactoryApiService`, auth controllers, all auth routes
- Removed all Vue pages from `resources/js/Pages/`
- Migrated from `app/Http/Kernel.php` to Laravel 12 `bootstrap/app.php` format

## Design Decisions

**No web fonts** — system font stack only (`-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, ...`). Faster load, no FOUT.

**No JavaScript framework** — a single `IntersectionObserver` block handles scroll-reveal. Nothing more.

**Dark theme hard-coded** — background `#0A0A0B`, text `#E4E4E7`, accent `violet-400`. No light mode toggle.
