<?php
/**
 * Guest Middleware
 * Redirects logged-in users away from guest-only pages like login
 */
return function($method, $params) {
    if (is_logged_in()) {
        header('Location: ' . url(is_admin() ? 'dashboard' : 'user-dashboard'));
        exit;
    }
    return true;
};
