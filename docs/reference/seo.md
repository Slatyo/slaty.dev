# SEO & Meta

All SEO metadata is in `resources/views/welcome.blade.php`.

## Meta Tags

```html
<title>Slaty — Developer & Crafter</title>
<meta name="description" content="Developer portfolio. Wisper, Possessly, and more.">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="Slaty — Developer & Crafter">
<meta property="og:description" content="Developer portfolio. Wisper, Possessly, and more.">
<meta property="og:url" content="https://slaty.dev">
<meta property="og:image" content="https://slaty.dev/favicon.svg">

<!-- Theme color (browser UI tint) -->
<meta name="theme-color" content="#0A0A0B">

<!-- Canonical URL -->
<link rel="canonical" href="https://slaty.dev">
```

## Icons

| File | Purpose |
|------|---------|
| `public/favicon.svg` | Browser tab favicon (SVG) |
| `public/apple-touch-icon.png` | iOS home screen icon (180×180 PNG) |

```html
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
```

## Sitemap & Robots

**`public/sitemap.xml`** — Single `<url>` entry for `https://slaty.dev`. Submitted via the `<link rel="sitemap">` tag in `<head>`.

**`public/robots.txt`**:
```
User-agent: *
Disallow:

Sitemap: https://slaty.dev/sitemap.xml
```

## JSON-LD Structured Data

Person schema embedded in `<head>`:

```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Slaty",
  "url": "https://slaty.dev",
  "sameAs": ["https://github.com/Slatyo"]
}
```

## Accessibility

- `<html lang="en">` is set
- All `<a>` tags have `aria-label` attributes
- Interactive elements have `focus-visible:outline` classes (Tailwind) for keyboard navigation
- Color contrast: `zinc-400` (`#A1A1AA`) on `#0A0A0B` background passes WCAG AA (5.3:1 ratio)
- `<main id="main-content">` aria landmark for skip-nav

## Lighthouse Targets

All four categories: **95+**

Run from Chrome DevTools → Lighthouse, or [PageSpeed Insights](https://pagespeed.web.dev/).
