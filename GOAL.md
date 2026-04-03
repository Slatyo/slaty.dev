# slaty.dev — GOAL.md

Personal developer site. Clean, dark, minimal. Shows projects and contact info. Nothing else.

**Branch:** `topic/improvements`
**Production:** slaty.dev (Laravel Forge, auto-deploys from `main`)

---

## ⚠️ Validation Rules

1. `php artisan test` — all tests must pass
2. `npm run build` — Vite build must succeed
3. Commit + push to `topic/improvements`

---

## 🔴 Rebuild: Fresh Single-Page Portfolio Site

Strip everything down to a fresh Laravel 12 + Blade + Tailwind site. One page, dark theme, no auth, no SPA framework.

### Phase 1 — Clean Slate

- [ ] Remove all Inertia.js, Vue, Breeze auth scaffolding, Satisfactory integration
- [ ] Remove: `resources/js/Pages/`, `app/Services/SatisfactoryApiService.php`, `app/Http/Controllers/SatisfactoryController.php`, `app/Http/Controllers/Auth/`, `app/Http/Controllers/ProfileController.php`
- [ ] Remove all auth routes from `routes/web.php` and `routes/auth.php`
- [ ] Remove: `app/Http/Kernel.php`, `app/Console/Kernel.php`, `app/Exceptions/Handler.php` — migrate to Laravel 12 `bootstrap/app.php` format
- [ ] Remove unused providers: `BroadcastServiceProvider`, `EventServiceProvider`, `AuthServiceProvider`, `RouteServiceProvider`
- [ ] Remove `@inertiajs/vue3`, `vue`, `@vitejs/plugin-vue` from `package.json`
- [ ] Clean up `composer.json` — remove `laravel/breeze` if no longer needed
- [ ] `routes/web.php` becomes just: `Route::get('/', fn () => view('welcome'))->name('home');`
- [ ] Run `php artisan test` (update/remove broken tests)
- [ ] Run `npm run build`

### Phase 2 — Build the Page

Single `welcome.blade.php` with these sections in order:

**Header area:**
- Name: **Slaty**
- One word or short tagline — "Developer & Crafter" (keep it neutral)

**Projects grid:**
4 cards, clean layout, each with:
- Project name
- One-line description
- Small tech badges (muted)
- Link to live site
- Link to GitHub repo

Projects:
- **Wisper** — "Private messaging with end-to-end encryption." → wisper.life | github.com/Slatyo/wisper
- **Possessly** — "Inventory tracking for collectors and businesses." → possessly.com | github.com/Slatyo/Possessly
- **Haus & Garten Siegerland** — "Business website for property services." → hausundgarten-siegerland.de | github.com/Slatyo/hausundgarten-siegerland
- **slaty.dev** — "This site." → slaty.dev | github.com/Slatyo/slaty.dev

The grid must be easy to extend (add more cards later).

**Contact:**
- "info@slaty.dev" as a mailto link
- GitHub: github.com/Slatyo
- No contact form, no "hire me", no pitch — just the info

**No about section. No life story. No buzzwords.**

- [ ] Create `resources/views/welcome.blade.php` — single file, all sections
- [ ] Dark theme: background `#0A0A0B`, text `#E4E4E7`, one subtle accent color for links
- [ ] System font stack (no web fonts)
- [ ] Fully responsive (mobile-first)
- [ ] Subtle CSS animations only: section fade-in on scroll, card hover scale (1.02x), hero text fade on load
- [ ] No JavaScript framework — pure Blade + Tailwind + vanilla JS for scroll observer

### Phase 3 — SEO & Meta

- [ ] `<title>Slaty — Developer & Crafter</title>`
- [ ] `<meta name="description" content="Developer portfolio. Wisper, Possessly, and more.">`
- [ ] OG tags: og:title, og:description, og:url (`https://slaty.dev`)
- [ ] Favicon (simple SVG in `public/`)
- [ ] JSON-LD Person schema with name + url + sameAs (GitHub link)
- [ ] Lighthouse target: 95+ all categories

### Phase 4 — Cleanup

- [ ] Remove all unused test files that reference auth/Satisfactory
- [ ] Remove `resources/js/Pages/` directory entirely (no more Vue pages)
- [ ] Remove `Documentation.vue`, `Satisfactory.vue`, `Dashboard.vue`, all auth pages
- [ ] Verify `npm run build` produces a clean bundle (Tailwind CSS only, no Vue)
- [ ] Final `php artisan test` — green
- [ ] Commit + push

---

## 🏗️ Tech Stack (Target)

| Layer | Tech |
|---|---|
| Backend | Laravel 12, PHP 8.4 |
| Frontend | Blade + Tailwind CSS 4 |
| JS | Vanilla (scroll observer only) |
| Deployment | Laravel Forge (auto-deploy on main) |
| Domain | slaty.dev |
