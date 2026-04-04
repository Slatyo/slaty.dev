<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slaty — Developer & Crafter</title>
    <meta name="description" content="Developer portfolio. Wisper, Possessly, and more.">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Slaty — Developer & Crafter">
    <meta property="og:description" content="Developer portfolio. Wisper, Possessly, and more.">
    <meta property="og:url" content="https://slaty.dev">

    <!-- Favicon -->
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- JSON-LD -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Slaty",
        "url": "https://slaty.dev",
        "sameAs": ["https://github.com/Slatyo"]
    }
    </script>
    @endverbatim

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* System font stack */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            background-color: #0A0A0B;
            color: #E4E4E7;
        }

        /* Fade-in animation for hero */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero-fade {
            animation: fadeUp 0.7s ease both;
        }
        .hero-fade-delay {
            animation: fadeUp 0.7s 0.15s ease both;
        }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Card hover */
        .project-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .project-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body class="antialiased min-h-screen">

    <!-- ─── HEADER / HERO ─── -->
    <header class="px-6 pt-20 pb-16 max-w-3xl mx-auto">
        <h1 class="hero-fade text-4xl sm:text-5xl font-bold tracking-tight text-zinc-50">Slaty</h1>
        <p class="hero-fade-delay mt-3 text-lg text-zinc-400">Developer &amp; Crafter</p>
    </header>

    <!-- ─── PROJECTS ─── -->
    <section class="px-6 pb-20 max-w-3xl mx-auto reveal">
        <h2 class="text-xs font-semibold uppercase tracking-widest text-zinc-500 mb-6">Projects</h2>

        <div class="grid gap-4 sm:grid-cols-2">

            <!-- Wisper -->
            <div class="project-card bg-zinc-900/60 border border-zinc-800 rounded-xl p-5 flex flex-col gap-3">
                <div>
                    <h3 class="text-zinc-50 font-semibold text-base">Wisper</h3>
                    <p class="mt-1 text-sm text-zinc-400">Private messaging with end-to-end encryption.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Node.js</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">React Native</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">E2EE</span>
                </div>
                <div class="flex gap-4 mt-auto text-sm">
                    <a href="https://wisper.life" target="_blank" rel="noopener" class="text-violet-400 hover:text-violet-300 transition-colors">wisper.life ↗</a>
                    <a href="https://github.com/Slatyo/wisper" target="_blank" rel="noopener" class="text-zinc-500 hover:text-zinc-300 transition-colors">GitHub ↗</a>
                </div>
            </div>

            <!-- Possessly -->
            <div class="project-card bg-zinc-900/60 border border-zinc-800 rounded-xl p-5 flex flex-col gap-3">
                <div>
                    <h3 class="text-zinc-50 font-semibold text-base">Possessly</h3>
                    <p class="mt-1 text-sm text-zinc-400">Inventory tracking for collectors and businesses.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Laravel</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Vue 3</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">SaaS</span>
                </div>
                <div class="flex gap-4 mt-auto text-sm">
                    <a href="https://possessly.com" target="_blank" rel="noopener" class="text-violet-400 hover:text-violet-300 transition-colors">possessly.com ↗</a>
                    <a href="https://github.com/Slatyo/Possessly" target="_blank" rel="noopener" class="text-zinc-500 hover:text-zinc-300 transition-colors">GitHub ↗</a>
                </div>
            </div>

            <!-- Haus & Garten Siegerland -->
            <div class="project-card bg-zinc-900/60 border border-zinc-800 rounded-xl p-5 flex flex-col gap-3">
                <div>
                    <h3 class="text-zinc-50 font-semibold text-base">Haus &amp; Garten Siegerland</h3>
                    <p class="mt-1 text-sm text-zinc-400">Business website for property services.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Laravel</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Tailwind</span>
                </div>
                <div class="flex gap-4 mt-auto text-sm">
                    <a href="https://hausundgarten-siegerland.de" target="_blank" rel="noopener" class="text-violet-400 hover:text-violet-300 transition-colors">hausundgarten-siegerland.de ↗</a>
                    <a href="https://github.com/Slatyo/hausundgarten-siegerland" target="_blank" rel="noopener" class="text-zinc-500 hover:text-zinc-300 transition-colors">GitHub ↗</a>
                </div>
            </div>

            <!-- slaty.dev -->
            <div class="project-card bg-zinc-900/60 border border-zinc-800 rounded-xl p-5 flex flex-col gap-3">
                <div>
                    <h3 class="text-zinc-50 font-semibold text-base">slaty.dev</h3>
                    <p class="mt-1 text-sm text-zinc-400">This site.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Laravel</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Blade</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-zinc-800 text-zinc-500">Tailwind</span>
                </div>
                <div class="flex gap-4 mt-auto text-sm">
                    <a href="https://slaty.dev" target="_blank" rel="noopener" class="text-violet-400 hover:text-violet-300 transition-colors">slaty.dev ↗</a>
                    <a href="https://github.com/Slatyo/slaty.dev" target="_blank" rel="noopener" class="text-zinc-500 hover:text-zinc-300 transition-colors">GitHub ↗</a>
                </div>
            </div>

        </div>
    </section>

    <!-- ─── CONTACT ─── -->
    <footer class="px-6 pb-20 max-w-3xl mx-auto reveal">
        <h2 class="text-xs font-semibold uppercase tracking-widest text-zinc-500 mb-4">Contact</h2>
        <div class="flex flex-wrap gap-6 text-sm">
            <a href="mailto:info@slaty.dev" class="text-violet-400 hover:text-violet-300 transition-colors">info@slaty.dev</a>
            <a href="https://github.com/Slatyo" target="_blank" rel="noopener" class="text-zinc-500 hover:text-zinc-300 transition-colors">github.com/Slatyo ↗</a>
        </div>
    </footer>

    <!-- ─── SCROLL OBSERVER ─── -->
    <script>
        (function () {
            const observer = new IntersectionObserver(
                function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.1 }
            );
            document.querySelectorAll('.reveal').forEach(function (el) {
                observer.observe(el);
            });
        })();
    </script>

</body>
</html>
