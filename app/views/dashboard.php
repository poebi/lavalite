<?php
try {
    $totalUsers = db()->table('paa_users')->count() ?: 0;
    $adminUsers = db()->table('paa_users')->where('role', 'admin')->count() ?: 0;
    $regularUsers = db()->table('paa_users')->where('role', '!=', 'admin')->count() ?: 0;
} catch (Throwable $e) {
    $totalUsers = $adminUsers = $regularUsers = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin System - LavaLite</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>
<body class="font-['Inter'] bg-neutral-950 min-h-screen text-neutral-300 selection:bg-red-900 selection:text-white">
    
    <!-- CRT Overlay -->
    <div class="fixed inset-0 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 mix-blend-overlay z-50"></div>

    <!-- Top Navbar -->
    <nav class="bg-neutral-950/90 backdrop-blur-md border-b border-red-900/50 sticky top-0 z-40 shadow-[0_4px_20px_rgba(220,38,38,0.15)] relative">
        <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-8 h-8 bg-red-900/30 flex items-center justify-center text-red-500 font-bold border border-red-500/50 shadow-[0_0_10px_rgba(220,38,38,0.5)] font-mono">
                    &gt;_
                </div>
                <h1 class="text-xl font-bold text-white font-mono tracking-widest drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">LAVA<span class="text-red-600">LITE</span><span class="text-neutral-500 text-sm"> :: ADMIN</span></h1>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden sm:block text-right">
                    <p class="text-xs font-mono text-red-500/70 uppercase tracking-widest"></p>
                    <p class="text-sm font-semibold text-neutral-200"><?= esc(auth_user()['paa_first_name'] ?? 'System Admin') ?></p>
                </div>
                <div class="h-8 w-px bg-red-900/50 hidden sm:block"></div>
                <a href="<?= url('logout') ?>" class="group flex items-center gap-2 px-4 py-2 bg-neutral-900 text-red-400 hover:text-white hover:bg-red-700 border border-red-900/50 hover:border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_15px_rgba(220,38,38,0.5)]">
                    <span>LOG OUT</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8 relative z-10">
        
        <!-- Header Section -->
        <div class="mb-8 border-l-2 border-red-600 pl-4">
            <h2 class="text-2xl font-bold text-white tracking-widest font-mono uppercase text-shadow-[0_0_10px_rgba(220,38,38,0.5)]">DASHBOARD</h2>
            <p class="text-neutral-500 mt-1 font-mono text-sm uppercase tracking-wider">SYSTEM MONITORING IS ACTIVE.</p>
        </div>

        <!-- Success Message -->
        <?php $success = get_flash('success'); if ($success): ?>
            <div class="mb-8 p-4 bg-red-900/20 border border-red-500 text-red-400 font-mono text-sm flex items-center gap-3 shadow-[0_0_15px_rgba(220,38,38,0.2)]">
                <span class="text-red-500 font-bold drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[OK]</span>
                <span><?php echo $success; ?></span>
            </div>
        <?php endif; ?>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Total Users -->
            <div class="bg-neutral-900/50 border border-red-900/50 p-6 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-red-900/10 rounded-full blur-2xl group-hover:bg-red-900/20 transition-all"></div>
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-xs font-mono text-red-500/70 mb-1 uppercase tracking-widest">TOTAL USERS</p>
                        <h3 class="text-4xl font-bold text-white font-mono"><?= sprintf("%04d", $totalUsers) ?></h3>
                    </div>
                </div>
            </div>

            <!-- Admin Users -->
            <div class="bg-neutral-900/50 border border-red-900/50 p-6 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-red-900/10 rounded-full blur-2xl group-hover:bg-red-900/20 transition-all"></div>
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-xs font-mono text-red-500/70 mb-1 uppercase tracking-widest">ADMINS</p>
                        <h3 class="text-4xl font-bold text-white font-mono"><?= sprintf("%04d", $adminUsers) ?></h3>
                    </div>
                </div>
            </div>

            <!-- Regular Users -->
            <div class="bg-neutral-900/50 border border-red-900/50 p-6 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-red-900/10 rounded-full blur-2xl group-hover:bg-red-900/20 transition-all"></div>
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-xs font-mono text-red-500/70 mb-1 uppercase tracking-widest">USERS</p>
                        <h3 class="text-4xl font-bold text-white font-mono"><?= sprintf("%04d", $regularUsers) ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Welcome Banner -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Call to Action Banner -->
            <div class="lg:col-span-2">
                <div class="h-full relative overflow-hidden bg-neutral-900 border border-red-900/50 p-8 sm:p-10 shadow-[0_0_30px_rgba(0,0,0,0.8)] flex flex-col justify-center group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.2)] transition-all">
                    <!-- Decor graphics -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-red-900/10 blur-3xl rounded-full mix-blend-screen pointer-events-none"></div>
                    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-600 to-transparent opacity-50"></div>

                    <div class="relative z-10 w-full max-w-lg">
                        <h3 class="text-2xl font-bold mb-3 tracking-widest text-white font-mono uppercase drop-shadow-[0_0_8px_rgba(220,38,38,0.5)]">ACCESS STATUS</h3>
                        <p class="text-neutral-400 text-sm mb-8 leading-relaxed font-mono">
                            Full Administrator Access Enabled.
                        </p>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="<?= url('users') ?>" class="px-6 py-3 bg-red-700 hover:bg-red-600 border border-red-500 text-white font-mono text-sm uppercase tracking-widest transition-all shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)] flex items-center gap-2">
                                [ CONTROL PANEL ]
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="lg:col-span-1">
                <h3 class="text-sm font-mono text-red-500 uppercase tracking-widest mb-4 px-1 border-b border-red-900/50 pb-2 inline-block">QUICK ACTIONS</h3>
                <div class="space-y-3 mt-2">
                    <a href="<?= url('users') ?>" class="group flex items-center justify-between p-4 bg-neutral-900/50 border border-red-900/30 hover:border-red-500 transition-all duration-300 hover:bg-red-900/10">
                        <div class="flex items-center gap-4">
                            <div>
                                <p class="font-mono text-sm text-neutral-200 uppercase tracking-widest group-hover:text-red-400 transition-colors">USER MANAGEMENT</p>
                                <p class="text-xs text-neutral-500 font-mono mt-1">View/edit records</p>
                            </div>
                        </div>
                        <span class="text-red-500 font-mono opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all">&gt;</span>
                    </a>

                    <a href="<?= url('users/create') ?>" class="group flex items-center justify-between p-4 bg-neutral-900/50 border border-red-900/30 hover:border-red-500 transition-all duration-300 hover:bg-red-900/10">
                        <div class="flex items-center gap-4">
                            <div>
                                <p class="font-mono text-sm text-neutral-200 uppercase tracking-widest group-hover:text-red-400 transition-colors">CREATE ACCOUNT</p>
                                <p class="text-xs text-neutral-500 font-mono mt-1">Create user record</p>
                            </div>
                        </div>
                        <span class="text-red-500 font-mono opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all">&gt;</span>
                    </a>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
