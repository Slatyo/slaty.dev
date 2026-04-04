# Project Structure

## Directory Tree

```
slaty.dev/
│
├── app/
│   └── Http/
│       └── (no custom controllers — route uses inline closure)
│
├── bootstrap/
│   └── app.php               # Laravel 12 bootstrap (replaces Kernel.php pattern)
│
├── config/
│   ├── app.php
│   ├── cache.php
│   └── ...                   # Standard Laravel config files
│
├── database/
│   ├── migrations/           # Standard Laravel migrations (users, jobs, cache)
│   ├── factories/
│   └── seeders/
│
├── docs/                     # VitePress documentation (this site)
│   ├── .vitepress/
│   │   └── config.ts
│   ├── guide/
│   │   ├── getting-started.md
│   │   ├── local-development.md
│   │   └── deployment.md
│   ├── reference/
│   │   ├── tech-stack.md
│   │   ├── project-structure.md
│   │   ├── projects.md
│   │   └── seo.md
│   ├── index.md
│   └── package.json
│
├── public/
│   ├── build/                # Vite output (fingerprinted assets)
│   ├── favicon.svg           # SVG favicon
│   ├── apple-touch-icon.png  # 180×180 PNG for iOS
│   ├── robots.txt
│   └── sitemap.xml
│
├── resources/
│   ├── css/
│   │   └── app.css           # Tailwind CSS directives (@tailwind base/components/utilities)
│   ├── js/
│   │   └── app.js            # Near-empty JS entry (Vite requires it)
│   └── views/
│       └── welcome.blade.php # The entire frontend
│
├── routes/
│   └── web.php               # GET / → view('welcome')
│
├── tests/
│   ├── Feature/
│   │   └── ExampleTest.php
│   └── Unit/
│       └── ExampleTest.php
│
├── .env.example
├── CLAUDE.md                 # AI coding guidelines
├── GOAL.md                   # Project roadmap & checklist
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

## Routing

`routes/web.php` has exactly one route:

```php
Route::get('/', fn () => view('welcome'))->name('home');
```

No controllers. No middleware groups beyond Laravel defaults. No API routes.

## Views

`resources/views/welcome.blade.php` is the entire frontend:

- HTML shell with all meta tags
- Tailwind utility classes for layout and styling
- Inline `<style>` block for animations and card hover
- Sections: Hero, Projects grid, Contact footer
- Inline `<script>` for `IntersectionObserver` scroll-reveal
