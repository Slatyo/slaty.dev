# Getting Started

**slaty.dev** is a personal developer portfolio site built with Laravel 12 and Blade. It lives at [slaty.dev](https://slaty.dev).

## Prerequisites

- PHP 8.4+
- Composer
- Node.js 18+ and npm
- A database (SQLite works fine for local; nothing is stored currently)

## Clone & Install

```bash
git clone https://github.com/Slatyo/slaty.dev.git
cd slaty.dev
```

### PHP dependencies

```bash
composer install
```

### Frontend dependencies

```bash
npm install
```

### Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your `APP_URL` (e.g. `http://localhost:8000`).

## Run Locally

Start the dev server:

```bash
php artisan serve
```

In a separate terminal, watch for frontend changes:

```bash
npm run dev
```

Visit `http://localhost:8000` in your browser.

## Run Tests

```bash
php artisan test
```

All tests should be green before committing.

## Build for Production

```bash
npm run build
```

This compiles and fingerprints the Tailwind CSS bundle into `public/build/`.
