<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $gender    = trim($_POST['gender'] ?? '');
    $address   = trim($_POST['address'] ?? '');
    $password  = trim($_POST['password'] ?? '');
    $role      = isset($_POST['is_admin']) ? 'admin' : 'user';

    if ($firstname === '' || $lastname === '' || $email === '' || $gender === '' || $address === '' || $password === '') {
        $error = "All fields and ACCESS_KEY are required.";
    } else {
        $result = db()->table('paa_users')->insert([
            'paa_first_name' => $firstname,
            'paa_last_name' => $lastname,
            'paa_email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'paa_gender' => $gender,
            'paa_adress' => $address,
            'role' => $role
        ]);

        if ($result) {
            header("Location: " . url('users'));
            exit;
        }

        $error = "Failed to allocate entity. Retrying recommended.";
    }
}
?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocate Entity - LavaLite System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>
<body class="font-['Inter'] relative min-h-screen py-10 bg-neutral-950 text-neutral-200 selection:bg-red-900 selection:text-white overflow-hidden">
    
    <!-- CRT Overlay -->
    <div class="fixed inset-0 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSJ0cmFuc3BhcmVudCIvPgo8cmVjdCB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 mix-blend-overlay z-0"></div>

    <div class="max-w-xl mx-auto px-6 relative z-10">
        
        <div class="mb-6 border-l-2 border-red-600 pl-4">
            <h2 class="text-2xl font-bold text-white tracking-widest font-mono uppercase drop-shadow-[0_0_10px_rgba(220,38,38,0.5)]">ADD NEW USER</h2>
            <p class="text-neutral-500 mt-1 font-mono text-sm uppercase tracking-wider">Create a new user account.</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="mb-6 p-4 bg-red-950/80 border border-red-500 text-white text-sm font-mono flex items-center gap-3 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                <span class="text-red-500 font-bold drop-shadow-[0_0_5px_rgba(220,38,38,0.8)]">[ERR]</span>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="bg-neutral-900/80 backdrop-blur-xl border border-red-900/50 p-6 shadow-[0_0_30px_rgba(0,0,0,0.8)] relative">
            <div class="absolute top-0 right-0 w-full h-[1px] bg-gradient-to-l from-transparent via-red-600 to-transparent opacity-70"></div>
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="group">
                    <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">FIRST NAME</label>
                    <input type="text" name="firstname" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all shadow-inner font-mono">
                </div>
                
                <div class="group">
                    <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">LAST NAME</label>
                    <input type="text" name="lastname" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all shadow-inner font-mono">
                </div>
            </div>

            <div class="group mb-4">
                <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">EMAIL ADDRESS</label>
                <input type="email" name="email" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all shadow-inner font-mono">
            </div>

            <div class="group mb-4">
                <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">PASSWORD</label>
                <input type="password" name="password" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all shadow-inner font-mono tracking-widest">
            </div>

            <div class="mb-4 bg-neutral-950 p-4 border border-red-900/30">
                <label class="inline-flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="is_admin" value="1" class="appearance-none w-4 h-4 bg-neutral-800 border border-red-900/50 checked:bg-red-600 checked:border-red-500 focus:outline-none transition-colors">
                    <span class="text-xs font-mono text-neutral-400 uppercase tracking-widest group-hover:text-red-400 transition-colors">GRANT ADMINISTRATOR ACCESS</span>
                </label>
            </div>

            <div class="group mb-4">
                <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">GENDER</label>
                <div class="relative">
                    <select name="gender" required class="appearance-none w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all font-mono cursor-pointer rounded-none">
                        <option value="" class="bg-neutral-900 text-neutral-500">Select...</option>
                        <option value="Male" class="bg-neutral-900 text-red-50">Male</option>
                        <option value="Female" class="bg-neutral-900 text-red-50">Female</option>
                        <option value="Other" class="bg-neutral-900 text-red-50">Other</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-red-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="group mb-6">
                <label class="block text-xs font-mono text-neutral-400 mb-1.5 transition-colors group-focus-within:text-red-500 uppercase tracking-widest">ADDRESS</label>
                <input type="text" name="address" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-red-100 transition-all shadow-inner font-mono">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-red-700 hover:bg-red-600 border border-red-500 text-white font-mono text-sm uppercase tracking-widest py-3 transition-all shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)]">SAVE USER</button>
                <a href="<?= url('users') ?>" class="flex-1 text-center bg-neutral-900 hover:bg-neutral-800 border border-red-900/50 hover:border-red-500 text-red-400 font-mono text-sm uppercase tracking-widest py-3 transition-all">CANCEL</a>
            </div>
        </form>
    </div>
</body>
</html>