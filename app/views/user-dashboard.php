<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entity Dashboard - LavaLite</title>
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
                <div class="w-8 h-8 bg-red-900/30 flex items-center justify-center text-red-500 font-bold border border-red-500/50 font-mono">
                    U_
                </div>
                <h1 class="text-xl font-bold text-white font-mono tracking-widest drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">LAVA<span class="text-red-600">LITE</span><span class="text-neutral-500 text-sm"> :: HUB</span></h1>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden sm:block text-right">
                    <p class="text-xs font-mono text-red-500/70 uppercase tracking-widest">ACTIVE_ID</p>
                    <p class="text-sm font-semibold text-neutral-200"><?= esc(auth_user()['paa_first_name'] ?? 'User') ?></p>
                </div>
                <div class="h-8 w-px bg-red-900/50 hidden sm:block"></div>
                <a href="<?= url('logout') ?>" class="group flex items-center gap-2 px-4 py-2 bg-neutral-900 text-red-400 hover:text-white hover:bg-red-700 border border-red-900/50 hover:border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_15px_rgba(220,38,38,0.5)]">
                    <span>Log Out</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <!-- Profile Info Card -->
            <div class="lg:col-span-1">
                <div class="bg-neutral-900 border border-red-900/50 shadow-[0_0_30px_rgba(0,0,0,0.8)] p-8 sticky top-24 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all object-cover">
                    <div class="absolute top-0 right-0 w-full h-[1px] bg-gradient-to-l from-transparent via-red-600 to-transparent opacity-50"></div>
                    
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 mx-auto bg-neutral-950 border border-red-500 text-red-500 flex items-center justify-center text-4xl font-mono mb-5 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                            <?= strtoupper(substr(auth_user()['paa_first_name'] ?? 'U', 0, 1)) ?>
                        </div>
                        <h3 class="text-2xl font-bold text-white tracking-widest font-mono uppercase drop-shadow-[0_0_5px_rgba(220,38,38,0.5)]">
                            <?= esc(auth_user()['paa_first_name'] ?? '') ?> 
                            <?= esc(auth_user()['paa_last_name'] ?? '') ?>
                        </h3>
                        <div class="mt-3">
                            <span class="inline-block px-3 py-1 bg-red-950/50 text-red-400 border border-red-900/50 font-mono text-xs uppercase tracking-widest">
                                CLASS: <?= esc(auth_user()['role'] ?? 'user') ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="h-px w-full bg-red-900/30 my-6"></div>
                    
                    <div class="space-y-4 text-sm font-mono tracking-wide">
                        <div>
                            <p class="text-xs text-red-500/70 uppercase mb-1 drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">Name</p>
                            <p class="text-neutral-300 break-all"><?= esc(auth_user()['paa_email'] ?? '') ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-red-500/70 uppercase mb-1 drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">Gender</p>
                            <p class="text-neutral-300"><?= esc(auth_user()['paa_gender'] ?? 'NULL') ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-red-500/70 uppercase mb-1 drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">Location</p>
                            <p class="text-neutral-300"><?= esc(auth_user()['paa_adress'] ?? 'UNKNOWN') ?></p>
                        </div>
                    </div>
                    
                    <a href="<?= url('profile/edit') ?>" class="mt-8 w-full flex items-center justify-center gap-2 px-4 py-3 bg-neutral-950 text-red-400 hover:text-white border border-red-900/50 hover:border-red-500 hover:bg-red-700 transition-all font-mono uppercase tracking-widest text-xs hover:shadow-[0_0_15px_rgba(220,38,38,0.4)]">
                        UPDATE PROFILE
                    </a>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Welcome Banner -->
                <div class="relative overflow-hidden bg-neutral-900 border border-red-900/50 shadow-[0_0_30px_rgba(0,0,0,0.8)] p-8 sm:p-10 hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.2)] transition-all">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-red-900/10 blur-3xl rounded-full mix-blend-screen pointer-events-none"></div>
                    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-600 to-transparent opacity-50"></div>
                    
                    <div class="relative z-10 w-full max-w-lg">
                        <h2 class="text-3xl font-bold mb-3 tracking-widest text-white font-mono uppercase drop-shadow-[0_0_8px_rgba(220,38,38,0.5)]">WELCOME, <?= esc(auth_user()['paa_first_name'] ?? 'USER') ?>_</h2>
                        <p class="text-neutral-400 text-sm leading-relaxed font-mono">
                            Entity dashboard active. Manage personal datastream and system configurations.
                        </p>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-neutral-900/50 border border-red-900/50 p-6 flex items-center gap-5 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-green-900/20 rounded-full blur-2xl group-hover:bg-green-900/30 transition-all"></div>
                        <div class="w-12 h-12 bg-neutral-950 border border-green-500/50 text-green-500 flex items-center justify-center font-mono shadow-[0_0_10px_rgba(34,197,94,0.3)]">
                            01
                        </div>
                        <div class="relative z-10">
                            <p class="text-xs font-mono text-red-500/70 mb-1 uppercase tracking-widest">STATUS</p>
                            <p class="text-xl font-bold text-green-500 font-mono tracking-widest drop-shadow-[0_0_5px_rgba(34,197,94,0.5)]">ONLINE</p>
                        </div>
                    </div>
                    
                    <div class="bg-neutral-900/50 border border-red-900/50 p-6 flex items-center gap-5 relative overflow-hidden group hover:border-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.15)] transition-all">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-red-900/10 rounded-full blur-2xl group-hover:bg-red-900/20 transition-all"></div>
                        <div class="w-12 h-12 bg-neutral-950 border border-red-500/50 text-red-500 flex items-center justify-center font-mono shadow-[0_0_10px_rgba(220,38,38,0.3)]">
                            TS
                        </div>
                        <div class="relative z-10">
                            <p class="text-xs font-mono text-red-500/70 mb-1 uppercase tracking-widest">ACCOUNT CREATED</p>
                            <p class="text-xl font-bold text-neutral-200 font-mono tracking-widest"><?= date('m-Y', strtotime(auth_user()['created_at'] ?? 'now')) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Account Actions -->
                <div class="bg-neutral-900 border border-red-900/50 shadow-[0_0_30px_rgba(0,0,0,0.8)] p-8">
                    <h3 class="text-sm font-mono text-red-500 uppercase tracking-widest mb-6 px-1 border-b border-red-900/50 pb-2 inline-block">SETTINGS</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="<?= url('profile/edit') ?>" class="group flex items-center p-5 bg-neutral-950/50 border border-red-900/30 hover:border-red-500 hover:bg-red-900/10 transition-all duration-300">
                            <div>
                                <p class="font-mono text-sm text-neutral-200 uppercase tracking-widest group-hover:text-red-400 transition-colors">Update</p>
                                <p class="text-xs text-neutral-500 font-mono mt-1">Update profile</p>
                            </div>
                        </a>
                        
                        <form method="POST" action="<?= url('logout') ?>" class="block">
                            <?= csrf_field() ?>
                            <button type="submit" class="w-full group flex items-center text-left p-5 bg-neutral-950/50 border border-red-900/30 hover:border-red-500 hover:bg-red-900/10 transition-all duration-300">
                                <div>
                                    <p class="font-mono text-sm text-neutral-200 uppercase tracking-widest group-hover:text-red-400 transition-colors">Log Out</p>
                                    <p class="text-xs text-neutral-500 font-mono mt-1">Sign Out</p>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
</body>
</html>
