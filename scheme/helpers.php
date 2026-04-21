<?php
defined('APP_ROOT') OR exit('No direct script access allowed');
/**
 * Global Helper Functions
 */

//get base url
function base_url(): string
{
    $scheme = (
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
    ) ? 'https' : 'http';

    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    $path = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
    $path = preg_replace('#/public$#', '', $path);

    return $scheme . '://' . $host . ($path ? $path : '') . '/';
}


//generate url based on BASE_URL
function url(string $path = ''): string
{
    $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/\\');
    if (strtolower(basename($doc_root)) === 'public') {
        if (str_starts_with($path, 'public/')) {
            $path = substr($path, 7);
        }
    }
    return rtrim(base_url(), '/') . '/' . ltrim($path, '/');
}

//generate csrf field
function csrf_field() {
    $router = Router::getInstance();
    return $router->csrf_field();
}

//set session flash data
function set_flash(string $key, string $message): void {
    $_SESSION['flash'][$key] = $message;
}

//get session flash data
function get_flash(string $key): ?string {
    $value = $_SESSION['flash'][$key] ?? null;
    unset($_SESSION['flash'][$key]);
    return $value;
}

function auth_user(): ?array {
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool {
    return isset($_SESSION['user_id']);
}

function is_admin(): bool {
    return !empty($_SESSION['role']) && strtolower($_SESSION['role']) === 'admin';
}

function login_user(array $user): void {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user'] = $user;
    $_SESSION['role'] = strtolower($user['role'] ?? 'user');
    $_SESSION['is_admin'] = $_SESSION['role'] === 'admin';

    // Regenerate session ID for security
    session_regenerate_id(true);

    // Ensure CSRF token is refreshed after session regeneration
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

function logout_user(): void {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}
function json_response($data, int $status = 200): never {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

//Database connection
function db() {
    $db = new Database();
    return $db;
}

//escape output
function esc($var, $double_encode = TRUE): string|array
{
    if (empty($var))
		{
			return $var;
		}

		if (is_array($var))
		{
			foreach (array_keys($var) as $key)
			{
				$var[$key] = esc($var[$key], $double_encode);
			}

			return $var;
		}

		return htmlspecialchars($var, ENT_QUOTES, 'utf-8', $double_encode);
}

//get segments
function segment($seg)
{
    $parts = is_int($seg) ? explode('/', $_SERVER['REQUEST_URI']) : FALSE;
    return isset($parts[$seg]) ? $parts[$seg] : false;
}