# Local Development

## Project Layout

```
slaty.dev/
├── app/                  # Laravel application code (minimal — just HTTP kernel)
├── bootstrap/            # Laravel bootstrap (app.php — Laravel 12 format)
├── config/               # Framework config files
├── database/             # Migrations, factories, seeders
├── public/               # Web root (favicon.svg, robots.txt, sitemap.xml, etc.)
├── resources/
│   ├── css/app.css       # Tailwind CSS entry point
│   ├── js/app.js         # Vanilla JS entry point (minimal)
│   └── views/
│       └── welcome.blade.php   # The entire site — single Blade template
├── routes/
│   └── web.php           # Single route: GET / → welcome
├── tests/                # PHPUnit tests
├── vite.config.js        # Vite + laravel-vite-plugin
├── tailwind.config.js    # Tailwind config
└── docs/                 # This VitePress documentation site
```

## Key Files

| File | Purpose |
|------|---------|
| `resources/views/welcome.blade.php` | The entire frontend — HTML, CSS classes, scroll JS |
| `routes/web.php` | Single route: `GET /` returns `view('welcome')` |
| `public/favicon.svg` | SVG favicon |
| `public/apple-touch-icon.png` | 180×180 PNG for iOS home screen |
| `public/sitemap.xml` | Single-URL sitemap for SEO |
| `public/robots.txt` | Allows all crawlers, references sitemap |

## Frontend Stack

No SPA framework. The frontend is:

- **Tailwind CSS 3** — utility classes applied in `welcome.blade.php`
- **Vanilla JS** — only a small `IntersectionObserver` block for scroll-reveal animations
- **Vite 4** — bundles `resources/css/app.css` + `resources/js/app.js`

The JS is inlined at the bottom of `<body>` as a self-executing function. There's no separate JS module — `resources/js/app.js` is essentially empty.

## Animations

Three animation behaviours are defined in `<style>` tags inside `welcome.blade.php`:

| Class | Effect |
|-------|--------|
| `.hero-fade` | Fade-up on load (0.7s) |
| `.hero-fade-delay` | Same, delayed 0.15s |
| `.reveal` | Fade-up on scroll (driven by `IntersectionObserver`) |
| `.project-card:hover` | Scale to 1.02×, subtle box-shadow |

## Linting & Formatting

PHP code style is enforced by **Laravel Pint**:

```bash
./vendor/bin/pint
```

Run before committing PHP changes.
