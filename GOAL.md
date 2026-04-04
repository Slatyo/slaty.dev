# slaty.dev — GOAL.md

Personal developer site. Clean, dark, minimal. Shows projects and contact info. Nothing else.

**Branch:** `topic/improvements`
**Production:** slaty.dev (Laravel Forge, auto-deploys from `main`)

---

## ⚠️ Validation Rules

1. `php artisan test` — all tests must pass
2. `npm run build` — Vite build must succeed
3. Commit + push to `topic/improvements`
4. **No GitHub links to private repositories.** Only slaty.dev itself is public. Wisper, Possessly, and Haus & Garten repos are private — do NOT link to their GitHub repos on the site. Link to their live URLs only.

---

## 🔴 Rebuild: Fresh Single-Page Portfolio Site

Strip everything down to a fresh Laravel 12 + Blade + Tailwind site. One page, dark theme, no auth, no SPA framework.

### Phase 1 — Clean Slate

- [x] Remove all Inertia.js, Vue, Breeze auth scaffolding, Satisfactory integration
- [x] Remove: `resources/js/Pages/`, `app/Services/SatisfactoryApiService.php`, `app/Http/Controllers/SatisfactoryController.php`, `app/Http/Controllers/Auth/`, `app/Http/Controllers/ProfileController.php`
- [x] Remove all auth routes from `routes/web.php` and `routes/auth.php`
- [x] Remove: `app/Http/Kernel.php`, `app/Console/Kernel.php`, `app/Exceptions/Handler.php` — migrate to Laravel 12 `bootstrap/app.php` format
- [x] Remove unused providers: `BroadcastServiceProvider`, `EventServiceProvider`, `AuthServiceProvider`, `RouteServiceProvider`
- [x] Remove `@inertiajs/vue3`, `vue`, `@vitejs/plugin-vue` from `package.json`
- [x] Clean up `composer.json` — remove `laravel/breeze` if no longer needed
- [x] `routes/web.php` becomes just: `Route::get('/', fn () => view('welcome'))->name('home');`
- [x] Run `php artisan test` (update/remove broken tests)
- [x] Run `npm run build`

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
- **Wisper** — "Private messaging with end-to-end encryption." → wisper.life (NO GitHub link — private repo)
- **Possessly** — "Inventory tracking for collectors and businesses." → possessly.com (NO GitHub link — private repo)
- **Haus & Garten Siegerland** — "Business website for property services." → hausundgarten-siegerland.de (NO GitHub link — private repo)
- **slaty.dev** — "This site." → slaty.dev | github.com/Slatyo/slaty.dev (public repo)

The grid must be easy to extend (add more cards later).

**Contact:**
- "info@slaty.dev" as a mailto link
- GitHub: github.com/Slatyo
- No contact form, no "hire me", no pitch — just the info

**No about section. No life story. No buzzwords.**

- [x] Create `resources/views/welcome.blade.php` — single file, all sections
- [x] Dark theme: background `#0A0A0B`, text `#E4E4E7`, one subtle accent color for links
- [x] System font stack (no web fonts)
- [x] Fully responsive (mobile-first)
- [x] Subtle CSS animations only: section fade-in on scroll, card hover scale (1.02x), hero text fade on load
- [x] No JavaScript framework — pure Blade + Tailwind + vanilla JS for scroll observer

### Phase 3 — SEO & Meta

- [x] `<title>Slaty — Developer & Crafter</title>`
- [x] `<meta name="description" content="Developer portfolio. Wisper, Possessly, and more.">`
- [x] OG tags: og:title, og:description, og:url (`https://slaty.dev`)
- [x] Favicon (simple SVG in `public/`)
- [x] JSON-LD Person schema with name + url + sameAs (GitHub link)
- [x] Lighthouse target: 95+ all categories

### Phase 4 — Cleanup

- [x] Remove all unused test files that reference auth/Satisfactory
- [x] Remove `resources/js/Pages/` directory entirely (no more Vue pages)
- [x] Remove `Documentation.vue`, `Satisfactory.vue`, `Dashboard.vue`, all auth pages
- [x] Verify `npm run build` produces a clean bundle (Tailwind CSS only, no Vue)
- [x] Final `php artisan test` — green
- [x] Commit + push

---

---

## 🟠 Polish & SEO Enhancements

### Sitemap + robots.txt

- [x] Generate `public/sitemap.xml` with a single `<url>` entry for `https://slaty.dev`
- [x] Update `public/robots.txt` to reference the sitemap: `Sitemap: https://slaty.dev/sitemap.xml`
- [x] Add `<link rel="sitemap" type="application/xml" href="/sitemap.xml">` to `<head>` in `welcome.blade.php`

### apple-touch-icon

- [x] Add a basic `apple-touch-icon.png` (180x180) or SVG fallback to `public/`
- [x] Add `<link rel="apple-touch-icon" href="/apple-touch-icon.png">` to `<head>` in `welcome.blade.php`

### Accessibility audit

- [x] Verify all interactive elements have visible focus styles (Tailwind `focus-visible:outline`)
- [x] Confirm color contrast on zinc-400 text against #0A0A0B background (WCAG AA)
- [x] Add `lang="en"` is already on `<html>` — confirm it's correct

---

## 🏗️ Tech Stack (Target)

| Layer | Tech |
|---|---|
| Backend | Laravel 12, PHP 8.4 |
| Frontend | Blade + Tailwind CSS 4 |
| JS | Vanilla (scroll observer only) |
| Deployment | Laravel Forge (auto-deploy on main) |
| Domain | slaty.dev |
