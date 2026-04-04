# Projects

The portfolio showcases four projects. Each is displayed as a card in the projects grid.

## Wisper

**Private messaging with end-to-end encryption.**

| | |
|-|-|
| Live | [wisper.life](https://wisper.life) |
| GitHub | [github.com/Slatyo/wisper](https://github.com/Slatyo/wisper) |
| Tech | Node.js, React Native, E2EE |

A private messaging platform focused on security. End-to-end encrypted DMs, voice calls, and group DMs.

## Possessly

**Inventory tracking for collectors and businesses.**

| | |
|-|-|
| Live | [possessly.com](https://possessly.com) |
| GitHub | [github.com/Slatyo/Possessly](https://github.com/Slatyo/Possessly) |
| Tech | Laravel, Vue 3, SaaS |

A SaaS inventory and possession tracking app. Stripe subscriptions, API access, import/export.

## Haus & Garten Siegerland

**Business website for property services.**

| | |
|-|-|
| Live | [hausundgarten-siegerland.de](https://hausundgarten-siegerland.de) |
| GitHub | [github.com/Slatyo/hausundgarten-siegerland](https://github.com/Slatyo/hausundgarten-siegerland) |
| Tech | Laravel, Tailwind CSS |

A business site for a local property services company in the Siegerland region.

## slaty.dev

**This site.**

| | |
|-|-|
| Live | [slaty.dev](https://slaty.dev) |
| GitHub | [github.com/Slatyo/slaty.dev](https://github.com/Slatyo/slaty.dev) |
| Tech | Laravel, Blade, Tailwind CSS |

The portfolio site itself. Clean, dark, minimal. Single-page.

---

## Adding a New Project

To add a new project card, edit `resources/views/welcome.blade.php` and copy one of the existing `<div class="project-card ...">` blocks inside the `sm:grid-cols-2` grid div. Update:

- `<h3>` — project name
- `<p>` — one-line description
- Tech badge `<span>` elements
- Both `<a>` links (live site + GitHub), including `aria-label` attributes
