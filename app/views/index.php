<?php
$rows = db()->table('paa_users')->get_all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entities - LavaLite System</title>
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
                    []
                </div>
                <h1 class="text-xl font-bold text-white font-mono tracking-widest drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">USER DATABASE<span class="text-red-600 animate-pulse">_</span></h1>
            </div>
            
            <div class="flex items-center gap-6">
                <?php if (is_logged_in()): ?>
                    <div class="hidden sm:block text-right">
                        <p class="text-xs font-mono text-red-500/70 uppercase tracking-widest">ACTIVE USER</p>
                        <p class="text-sm font-semibold text-neutral-200"><?= esc(auth_user()['paa_first_name'] ?? 'User') ?></p>
                    </div>
                    <div class="h-8 w-px bg-red-900/50 hidden sm:block"></div>
                    <a href="<?= is_admin() ? url('dashboard') : url('user-dashboard') ?>" class="group flex items-center gap-2 px-4 py-2 bg-neutral-900 text-red-400 hover:text-white hover:bg-red-700 border border-red-900/50 hover:border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_15px_rgba(220,38,38,0.5)]">
                        <?= is_admin() ? 'BACK' : 'DASHBOARD' ?>
                    </a>
                    <form method="POST" action="<?= url('logout') ?>" style="display: inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="group flex items-center gap-2 px-4 py-2 bg-neutral-900 text-red-400 hover:text-white hover:bg-neutral-800 border border-red-900/50 hover:border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_15px_rgba(220,38,38,0.5)]">
                            LOGOUT
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?= url('login') ?>" class="group flex items-center gap-2 px-4 py-2 bg-red-700 text-white hover:bg-red-600 border border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_15px_rgba(220,38,38,0.5)]">
                        LOGIN
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-10 relative z-10">
        <h2 class="mb-6 text-2xl font-bold text-white tracking-widest font-mono uppercase drop-shadow-[0_0_10px_rgba(220,38,38,0.5)] border-l-2 border-red-600 pl-4">REGISTERED USERS</h2>
        
        <?php $success = get_flash('success'); if ($success): ?>
            <div class="mb-6 p-4 bg-red-900/20 border border-red-500 text-red-400 font-mono text-sm flex items-center gap-3 shadow-[0_0_15px_rgba(220,38,38,0.2)]">
                <span class="text-red-500 font-bold drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[OK]</span>
                <span><?php echo $success; ?></span>
            </div>
        <?php endif; ?>
        
        <?php $error = get_flash('error'); if ($error): ?>
            <div class="mb-6 p-4 bg-red-950/80 border border-red-500 text-white text-sm font-mono flex items-center gap-3 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                <span class="text-red-500 font-bold drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[ERR]</span>
                <span><?php echo $error; ?></span>
            </div>
        <?php endif; ?>
        
        <a href="<?= url('users/create') ?>" class="inline-block mb-6 px-4 py-2 bg-red-700 hover:bg-red-600 border border-red-500 text-white font-mono text-sm uppercase tracking-widest transition-all shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)]">+ ADD NEW USER</a>

        <div class="overflow-x-auto bg-neutral-900 border border-red-900/50 shadow-[0_0_30px_rgba(0,0,0,0.8)] relative">
            <div class="absolute top-0 right-0 w-full h-[1px] bg-gradient-to-l from-transparent via-red-600 to-transparent opacity-50"></div>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-neutral-950/80 text-red-500 font-mono text-xs uppercase tracking-widest border-b border-red-900/50">
                        <th class="px-4 py-3 text-left">USER ID</th>
                        <th class="px-4 py-3 text-left">FIRST NAME</th>
                        <th class="px-4 py-3 text-left">LAST NAME</th>
                        <th class="px-4 py-3 text-left">EMAIL ADDRESS</th>
                        <th class="px-4 py-3 text-left">GENDER</th>
                        <th class="px-4 py-3 text-left">ADDRESS</th>
                        <th class="px-4 py-3 text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="font-mono text-sm">
                    <?php if (empty($rows)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-8 text-neutral-600 tracking-widest uppercase">NO RECORDS FOUND</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($rows as $row): ?>
                            <tr class="hover:bg-red-900/10 border-b border-red-900/20 transition-colors">
                                <td class="px-4 py-3 text-red-400 font-bold"><?php echo sprintf("%04d", $row['id']) ?></td> 
                                <td class="px-4 py-3 text-neutral-300"><?= esc($row['paa_first_name']) ?></td>
                                <td class="px-4 py-3 text-neutral-300"><?= esc($row['paa_last_name']) ?></td>
                                <td class="px-4 py-3 text-neutral-400"><?= esc($row['paa_email']) ?></td>
                                <td class="px-4 py-3 text-neutral-400"><?= esc($row['paa_gender']) ?></td>
                                <td class="px-4 py-3 text-neutral-400 truncate max-w-[150px]"><?= esc($row['paa_adress']) ?></td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <a href="<?= url('users/' . $row['id'] . '/edit') ?>" class="inline-block px-3 py-1 bg-neutral-950 hover:bg-red-700 text-red-400 hover:text-white border border-red-900/50 hover:border-red-500 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_10px_rgba(220,38,38,0.5)]">EDIT</a>
                                    <form method="POST" action="<?= url('users/' . $row['id'] . '/delete') ?>" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="inline-block px-3 py-1 bg-neutral-950 hover:bg-neutral-800 text-red-600 hover:text-red-500 border border-red-900/50 transition-all font-mono text-xs uppercase tracking-widest hover:shadow-[0_0_10px_rgba(220,38,38,0.3)] cursor-pointer">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>