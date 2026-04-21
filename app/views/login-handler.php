<?php
/**
 * Login Handler
 * Processes GET (display form) and POST (process login) requests
 */

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display login form
    include __DIR__ . '/login.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process login
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (empty($email) || empty($password)) {
        set_flash('error', 'Email and password are required.');
        header('Location: ' . url('login'));
        exit;
    }

    // Check for admin credentials
    if ($email === ADMIN_EMAIL && $password === ADMIN_PASSWORD) {
        // Admin login
        $admin_user = [
            'id' => 0,
            'paa_first_name' => 'Admin',
            'paa_last_name' => 'User',
            'paa_email' => ADMIN_EMAIL,
            'paa_gender' => 'N/A',
            'paa_adress' => 'N/A',
            'role' => 'admin'
        ];
        login_user($admin_user);

        set_flash('success', 'Welcome Admin! You have been logged in successfully.');
        header('Location: ' . url('dashboard'));
        exit;
    }

    // Check database for user
    $user = db()
        ->table('paa_users')
        ->where('paa_email', $email)
        ->get();

    if (!$user) {
        set_flash('error', 'Invalid email or password.');
        header('Location: ' . url('login'));
        exit;
    }

    // Verify password using PHP's password_verify
    // Check both paa_password and password columns for backward compatibility
    $password_correct = false;
    $stored_password = $user['password'] ?? $user['password'] ?? '';
    
    if (empty($stored_password)) {
        set_flash('error', 'Invalid email or password.');
        header('Location: ' . url('login'));
        exit;
    }
    
    if (password_get_info($stored_password)['algo'] === 0) {
        // Password is not hashed, do simple comparison (for demo only)
        $password_correct = ($password === $stored_password);
    } else {
        // Password is hashed, use password_verify
        $password_correct = password_verify($password, $stored_password);
    }

    if (!$password_correct) {
        set_flash('error', 'Invalid email or password.');
        header('Location: ' . url('login'));
        exit;
    }

    // Login successful
    login_user($user);
    set_flash('success', 'Welcome ' . $user['paa_first_name'] . '! You have been logged in successfully.');
    
    if ($remember) {
        // Optional: Set a remember me cookie (max 30 days)
        setcookie('remember_user', $user['id'], time() + (30 * 24 * 60 * 60), '/');
    }

    header('Location: ' . url('user-dashboard'));
    exit;
}
