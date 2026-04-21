<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $gender    = trim($_POST['gender'] ?? '');
    $address   = trim($_POST['address'] ?? '');
    $password  = trim($_POST['password'] ?? '');

    if ($firstname === '' || $lastname === '' || $email === '' || $gender === '' || $address === '' || $password === '') {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please provide a valid email address.';
    } else {
        $existing = db()
            ->table('paa_users')
            ->where('paa_email', $email)
            ->get();

        if ($existing) {
            $error = 'This email is already registered. Please login or use another email.';
        } else {
            $result = db()->table('paa_users')->insert([
                'paa_first_name' => $firstname,
                'paa_last_name'  => $lastname,
                'paa_email'      => $email,
                'password'   => password_hash($password, PASSWORD_DEFAULT),
                'paa_gender'     => $gender,
                'paa_adress'     => $address,
                'role'           => 'user'
            ]);

            if ($result) {
                set_flash('success', 'Registration successful. Please login to continue.');
                header('Location: ' . url('login'));
                exit;
            }

            $error = 'Registration failed. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LavaLite System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('public/css/style.css') ?>">
</head>
<body class="font-['Inter'] relative min-h-screen flex items-center justify-center p-4 py-12 bg-neutral-950 text-neutral-200 selection:bg-red-900 selection:text-white overflow-hidden">
    
    <div class="fixed inset-0 pointer-events-none"></div>

    <div class="w-full max-w-[500px] relative z-10">

        <!-- HEADER LABELS UPDATED -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold tracking-tighter text-white mb-2 font-mono">
                JOIN_<span class="text-red-600">SYSTEM</span>_
            </h1>
            <p class="text-red-500/70 font-mono text-sm uppercase tracking-widest border-b border-red-900/50 pb-2 inline-block">
                USER REGISTRATION
            </p>
        </div>

        <div class="bg-neutral-900/80 backdrop-blur-xl border border-red-900/50 p-8 sm:p-10">

            <?php if (!empty($error)): ?>
                <div class="mb-6 p-4 bg-red-950/80 border border-red-500 text-white text-sm font-mono flex items-center gap-3">
                    <span class="text-red-500 font-bold">[ERR]</span>
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= url('register') ?>" class="space-y-5">
                <?= csrf_field() ?>

                <!-- LABELS UPDATED ONLY -->

                <div class="grid grid-cols-2 gap-4">
                    <div class="group">
                        <label for="firstname" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                            FIRST NAME
                        </label>
                        <input id="firstname" name="firstname" type="text" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                    </div>

                    <div class="group">
                        <label for="lastname" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                            LAST NAME
                        </label>
                        <input id="lastname" name="lastname" type="text" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                    </div>
                </div>

                <div class="group">
                    <label for="email" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                        EMAIL ADDRESS
                    </label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="group">
                        <label for="password" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                            PASSWORD
                        </label>
                        <input id="password" name="password" type="password" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                    </div>

                    <div class="group">
                        <label for="gender" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                            GENDER
                        </label>
                        <select id="gender" name="gender" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                            <option value="">Select...</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>

                </div>

                <div class="group">
                    <label for="address" class="block text-xs font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                        ADDRESS
                    </label>
                    <input id="address" name="address" type="text" required class="w-full px-4 py-3 bg-neutral-950 border border-red-900/50 text-red-100">
                </div>

                <button type="submit" class="w-full bg-red-700 text-white py-3 font-mono uppercase tracking-widest">
                    CREATE ACCOUNT
                </button>

            </form>
        </div>

        <!-- FOOTER LABEL UPDATED -->
        <p class="mt-8 text-center text-xs font-mono text-neutral-500 uppercase tracking-widest">
            Already registered? <a href="<?= url('login') ?>" class="text-red-500">LOGIN</a>
        </p>

    </div>
</body>
</html>