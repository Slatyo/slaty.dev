# slaty.dev — GOAL.md

Personal developer portfolio and project showcase site. Laravel 12 + Inertia.js + Vue 3 + Tailwind CSS 3. Has auth (Breeze), a Satisfactory game server dashboard, and a documentation page.

**Branch:** `topic/improvements`
**Production:** slaty.dev (Laravel Forge, auto-deploys from `main`)

---

## ⚠️ Validation Rules

1. `php artisan test` — all tests must pass
2. `npm run build` — Vite build must succeed
3. Commit + push to `topic/improvements`

---

## 📋 Active TODOs

### 🟠 Upgrade: Old Laravel Skeleton (Pre-12 Bootstrap)

The project uses the old `bootstrap/app.php` format with `$app = new Application()` and separate `App\Http\Kernel`, `App\Console\Kernel`, `App\Exceptions\Handler` classes. Laravel 12 uses the new streamlined bootstrap. This prevents some newer packages (like Laravel Boost) from working correctly.

- [ ] Migrate `bootstrap/app.php` to the new Laravel 12 format using `Application::configure()`
- [ ] Remove `App\Http\Kernel` — move middleware to `bootstrap/app.php`
- [ ] Remove `App\Console\Kernel` — move schedule to `routes/console.php`
- [ ] Remove `App\Exceptions\Handler` — move exception handling to `bootstrap/app.php`
- [ ] Remove unused service providers (`BroadcastServiceProvider`, `EventServiceProvider`, `AuthServiceProvider`, `RouteServiceProvider`) if they only contain defaults
- [ ] Run `php artisan test` — verify nothing broke
- [ ] Run `npm run build` — verify frontend still works

---

### 🟠 Improve: Welcome/Portfolio Page Content

The Welcome page is the landing page at slaty.dev. Verify it showcases your projects and skills effectively.

- [ ] Review `resources/js/Pages/Welcome.vue` — does it list your projects (Wisper, Possessly)?
- [ ] Add links to live projects and GitHub repos
- [ ] Add a brief "About me" section
- [ ] Ensure responsive design works on mobile
- [ ] Check that the page loads fast (Lighthouse)

---

### 🟡 Fix: Satisfactory Service Constructor Uses Route Parameter

`SatisfactoryApiService` resolves the host in the constructor using `request()->route('satisfactory')`. This is fragile — it fails outside of HTTP context (artisan commands, tests, queues).

- [ ] Refactor: accept `$serverName` as a constructor parameter instead of reading from request
- [ ] Inject the server name from the controller: `new SatisfactoryApiService($serverName)`
- [ ] Or: use a factory/method approach: `SatisfactoryApiService::forServer('pioneer')`
- [ ] Run `php artisan test`

---

### 🟡 Missing: Documentation Page Content

`/documentation` route renders `Documentation.vue` but it may be empty or placeholder content.

- [ ] Review `resources/js/Pages/Documentation.vue`
- [ ] If it's a placeholder, either add real content (API docs for your projects, dev notes) or remove the route
- [ ] If keeping it, make sure it's linked from the navigation

---

### 🟡 Code Quality: Remove Unused Auth Scaffolding

Breeze installed a full auth flow (login, register, password reset, email verification, profile edit). If this site only needs login for the Satisfactory dashboard and nothing else, remove the unused parts.

- [ ] Check if registration is needed — if not, remove `register` route and page
- [ ] Check if password reset is needed — if not, remove those routes
- [ ] Check if email verification is needed — if not, remove that middleware
- [ ] Keep login + profile if the dashboard requires auth

---

### 🟢 Quick Win: SEO — Meta Tags + OG Tags

- [ ] Add `<meta name="description">` to the layout
- [ ] Add OG tags for the Welcome page (og:title, og:description)
- [ ] Add a favicon if not present

---

### 🟢 Quick Win: Error Pages

- [ ] `resources/js/Pages/Error/404.vue` and `500.vue` exist — verify they match site design
- [ ] Add a link back to home from each error page

---

## 🏗️ Tech Stack

| Layer | Tech |
|---|---|
| Backend | Laravel 12, PHP 8.4, Inertia.js |
| Frontend | Vue 3, Tailwind CSS 3, Vite 4 |
| Auth | Laravel Breeze + Sanctum |
| Features | Satisfactory game server dashboard |
| Deployment | Laravel Forge (auto-deploy on main) |
| Domain | slaty.dev |
