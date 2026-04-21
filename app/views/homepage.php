<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LavaLite - Keep it light. Build it fast</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>
<body class="font-['Inter'] bg-neutral-950 text-neutral-300 min-h-screen leading-relaxed selection:bg-red-900 selection:text-white">

    <div class="fixed inset-0 pointer-events-none" style="background: radial-gradient(circle at 50% 0%, rgba(220,38,38,0.08) 0%, transparent 70%);"></div>
    <div class="fixed inset-0 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 mix-blend-overlay"></div>

    <div class="max-w-5xl mx-auto px-6 relative z-10">

        <header class="pt-24 pb-24 text-center">
            <h1 class="text-6xl md:text-7xl font-extrabold mb-3 leading-tight tracking-tighter text-white font-mono drop-shadow-[0_0_15px_rgba(220,38,38,0.8)]"><span class="text-red-600">Lava</span>Lite<span class="text-red-600 animate-pulse">_</span></h1>
            <div class="text-lg text-red-500/70 mb-12 font-mono uppercase tracking-widest border-b border-red-900/50 inline-block pb-2">Routing + SQL Builder. Zero bloat.</div>

            <p class="text-xl max-w-2xl mx-auto mb-10 text-neutral-400">
                The lightweight PHP framework that gets out of your way<br>
                and lets you ship fast — with a <span class="text-red-500 shadow-red-500/50 drop-shadow-md">crimson soul</span>.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="<?= url('login') ?>" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-bold bg-red-700 text-white border border-red-500 rounded-none transition-all duration-200 hover:bg-red-600 hover:-translate-y-0.5 shadow-[0_0_15px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.7)] font-mono uppercase tracking-wider">LOGIN TO SYSTEM</a>
                <a href="https://github.com/ronmarasigan/lavalite" target="_blank" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-bold bg-neutral-900/80 text-red-500 border border-red-900/50 rounded-none transition-all duration-200 hover:bg-neutral-900 hover:border-red-500 hover:-translate-y-0.5 font-mono uppercase tracking-wider">View on GitHub</a>
            </div>
        </header>

        <section class="py-16 text-center border-t border-red-900/30">
            <h2 class="text-2xl mb-4 font-mono text-red-500 uppercase tracking-widest">[ Core Features ]</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-neutral-900/50 backdrop-blur-sm border border-red-900/30 p-8 transition-all duration-300 hover:border-red-500/70 hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] group">
                    <div class="text-4xl mb-5 text-red-600 group-hover:text-red-500 transition-colors font-mono">&gt;_</div>
                    <div class="text-xl mb-3 font-semibold text-neutral-200 uppercase tracking-wide">Fast Routing</div>
                    <p class="text-neutral-500 text-sm">Simple, expressive routes with zero magic. Just works.</p>
                </div>

                <div class="bg-neutral-900/50 backdrop-blur-sm border border-red-900/30 p-8 transition-all duration-300 hover:border-red-500/70 hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] group relative overflow-hidden">
                    <div class="absolute inset-0 bg-red-900/5 translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></div>
                    <div class="relative z-10">
                        <div class="text-4xl mb-5 text-red-600 group-hover:text-red-500 transition-colors font-mono">{}</div>
                        <div class="text-xl mb-3 font-semibold text-neutral-200 uppercase tracking-wide">SQL Builder</div>
                        <p class="text-neutral-500 text-sm">Fluent, safe queries &mdash; no more concatenation nightmares.</p>
                    </div>
                </div>

                <div class="bg-neutral-900/50 backdrop-blur-sm border border-red-900/30 p-8 transition-all duration-300 hover:border-red-500/70 hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] group">
                    <div class="text-4xl mb-5 text-red-600 group-hover:text-red-500 transition-colors font-mono">01</div>
                    <div class="text-xl mb-3 font-semibold text-neutral-200 uppercase tracking-wide">Lightweight</div>
                    <p class="text-neutral-500 text-sm">Only what you need. No heavy dependencies. ~58 KB.</p>
                </div>
            </div>
        </section>

        <footer class="text-center py-16 pb-12 text-red-900/50 font-mono text-sm border-t border-red-900/30 mt-8">
            <p>sys.LavaLite.init() // 2025&ndash;2026</p>
        </footer>

    </div>

</body>
</html>