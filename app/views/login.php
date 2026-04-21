<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LavaLite System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>
<body class="font-['Inter'] relative min-h-screen flex items-center justify-center p-4 bg-neutral-950 text-neutral-200 selection:bg-red-900 selection:text-white overflow-hidden">
    
    <!-- Cyberpunk CRT Grid / Overlays -->
    <div class="fixed inset-0 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 mix-blend-overlay"></div>
    <div class="fixed inset-0 pointer-events-none bg-gradient-to-tr from-red-900/10 via-transparent to-black"></div>
    <div class="fixed top-[-20%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-red-900/20 blur-[150px] mix-blend-screen pointer-events-none"></div>

    <div class="w-full max-w-[420px] relative z-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold tracking-tighter text-white mb-2 drop-shadow-sm font-mono">
               <span class="text-red-600 drop-shadow-[0_0_10px_rgba(220,38,38,0.8)]">LOGIN</span><span class="text-red-600 animate-pulse">_</span>
            </h1>
            <p class="text-red-500/70 font-mono text-sm uppercase tracking-widest border-b border-red-900/50 pb-2 inline-block">Authorization Required</p>
        </div>

        <!-- Login Card -->
        <div class="bg-neutral-900/80 backdrop-blur-xl border border-red-900/50 p-8 sm:p-10 transition-all duration-300 shadow-[0_0_30px_rgba(0,0,0,0.8)] relative">
            <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-red-600 to-transparent opacity-70"></div>
            
            <!-- Success Message -->
            <?php $success = get_flash('success'); if ($success): ?>
                <div class="mb-6 p-4 bg-red-950/50 border border-red-500/30 text-red-400 text-sm font-mono flex items-center gap-3">
                    <span class="text-red-500 drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[OK]</span>
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php $error = get_flash('error'); if ($error): ?>
                <div class="mb-6 p-4 bg-red-950/80 border border-red-500 text-white text-sm font-mono flex items-center gap-3 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                    <span class="text-red-500 font-bold drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[ERR]</span>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" action="<?= url('login') ?>" class="space-y-6">
                <!-- CSRF Token -->
                <?= csrf_field() ?>

                <!-- Email Field -->
                <div class="group">
                    <label for="email" class="block text-xs font-mono text-neutral-400 mb-2 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">Email</label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 placeholder-neutral-700 transition-all font-mono shadow-inner"
                            placeholder="user@system.net"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div class="group">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-mono text-neutral-400 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">Password</label>
                    </div>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 placeholder-neutral-700 transition-all font-mono tracking-widest shadow-inner"
                            placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full overflow-hidden bg-red-700 hover:bg-red-600 border border-red-500 transition-all duration-300 shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)] group mt-8 relative">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] mix-blend-overlay opacity-20"></div>
                    <div class="relative flex items-center justify-center px-6 py-3.5">
                        <span class="text-white font-mono font-bold uppercase tracking-[0.2em] flex items-center gap-2">
                            Sign In
                            <span class="text-red-300 group-hover:translate-x-1 transition-transform">&gt;</span>
                        </span>
                    </div>
                </button>
            </form>
        </div>
        
        <div class="mt-8 text-center text-xs font-mono text-neutral-500 uppercase tracking-widest">
            Unregistered? <a href="<?= url('register') ?>" class="text-red-500 hover:text-red-400 hover:shadow-[0_0_10px_rgba(220,38,38,0.5)] transition-all">Create Account
                
            </a>
        </div>
    </div>
</body>
</html>
