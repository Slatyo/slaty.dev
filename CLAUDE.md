# slaty.dev — AI Coding Guidelines

## Project Context
This is a personal portfolio/dev site at slaty.dev. Laravel 12 + Inertia.js + Vue 3 + Tailwind CSS 3.
Deployed via Laravel Forge with auto-deployment on `main` branch push.

## Stack
- PHP 8.4, Laravel 12, Inertia.js v2, Vue 3, Tailwind CSS 3
- Laravel Sanctum (auth), Ziggy (routes), Laravel Breeze (scaffolding)
- PHPUnit 11, Laravel Pint (formatting)
- Vite 4 for frontend bundling

## Conventions
- Follow existing code patterns — check sibling files before creating new ones
- Use descriptive names for variables and methods
- Run `./vendor/bin/pint` before committing PHP changes
- Run `npm run build` after any frontend changes
- Run `php artisan test` before pushing

## Architecture
- Standard Laravel MVC with Inertia.js pages
- Pages in `resources/js/Pages/`
- Blade views in `resources/views/` (some pages use Blade, others Inertia)
- Has a Satisfactory game server integration (`SatisfactoryApiService`)
- Auth with login/register via Breeze

## Deployment
- **Production:** slaty.dev (Laravel Forge, auto-deploys from `main`)
- **Work branch:** `topic/improvements` — merge to `main` when ready
- Never push directly to `main`

## Do Not
- Do not change dependencies without approval
- Do not create new base folders without approval
- Do not add unnecessary complexity to a simple portfolio site
