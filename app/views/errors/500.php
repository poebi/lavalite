<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>500 | SYS_ERR_INTERNAL</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>

<body class="font-['Inter'] relative min-h-screen flex items-center justify-center p-4 bg-neutral-950 text-neutral-200 selection:bg-red-900 selection:text-white overflow-hidden">
    
    <!-- CRT Overlay -->
    <div class="fixed inset-0 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 mix-blend-overlay z-0"></div>
    <div class="fixed inset-0 pointer-events-none bg-red-900/10 animate-pulse"></div>

    <main class="w-full max-w-[500px] bg-neutral-900/80 backdrop-blur-xl border border-red-500 p-8 sm:p-10 shadow-[0_0_40px_rgba(220,38,38,0.4)] relative z-10" role="main">
        <div class="absolute top-0 right-0 w-full h-[2px] bg-red-600 opacity-80"></div>
        
        <div class="text-xs font-mono font-bold text-red-500 bg-red-950/80 border border-red-500/50 inline-block px-3 py-1 mb-6 shadow-[0_0_10px_rgba(220,38,38,0.3)]">
            #500_INTERNAL_SERVER_ERROR
        </div>

        <h1 class="text-3xl font-bold font-mono tracking-widest uppercase text-white mb-4 drop-shadow-[0_0_10px_rgba(220,38,38,0.8)] border-b border-red-900/50 pb-4">
            FATAL_EXCEPTION
        </h1>
        
        <div class="bg-neutral-950 border border-red-900/50 p-4 mb-6">
            <p class="font-mono text-sm text-red-400 break-words font-medium">
                [EXCEPTION_LOG]: <?= esc($error ?? 'Unknown system failure on sequence processing.') ?>
            </p>
        </div>

        <div class="flex flex-wrap gap-4 mt-8">
            <a href="<?= url('/') ?>" class="flex-1 text-center font-mono font-bold uppercase tracking-widest text-white bg-red-700 hover:bg-red-600 border border-red-500 px-4 py-3 transition-all shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)]">
                &lt; ROOT_DIR
            </a>
            <a href="javascript:history.back()" class="flex-1 text-center font-mono font-bold uppercase tracking-widest text-red-400 bg-neutral-950 hover:bg-neutral-900 border border-red-900/50 hover:border-red-500 px-4 py-3 transition-all">
                &lt;_BACK
            </a>
        </div>

        <div class="mt-8 pt-4 border-t border-red-900/30 text-xs font-mono text-neutral-500">
            &gt; SYSTEM_HINT: RE-INITIALIZE CACHE (<span class="bg-neutral-800 text-neutral-300 px-1 border border-neutral-700 rounded-sm">CTRL</span> + <span class="bg-neutral-800 text-neutral-300 px-1 border border-neutral-700 rounded-sm">R</span>/ <span class="bg-neutral-800 text-neutral-300 px-1 border border-neutral-700 rounded-sm">L</span>)
        </div>
    </main>
</body>
</html>
