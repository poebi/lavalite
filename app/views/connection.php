<?php
// 1. Force fetch variables
$host = getenv('DB_HOST');
$db   = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

// 2. DEBUG CHECK: If this triggers, Render isn't passing the data!
if (!$host || !$db || !$user) {
    die("FATAL ERROR: Environment variables are missing from Render. 
         Check your Dashboard > Environment tab.");
}

try {
    // 3. Force TCP connection by adding port=3306
    $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=utf8mb4";
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // If we get here, it worked!
} catch (PDOException $e) {
    // This will tell us if it's "Access Denied" or "Connection Refused"
    die("DATABASE CONNECTION FAILED: " . $e->getMessage());
}