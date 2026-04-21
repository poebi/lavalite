<?php
/**
 * Admin Middleware
 * Ensures user has admin role to access admin routes
 */
return function($method, $params) {
    if (!is_logged_in()) {
        set_flash('error', 'Please login to access this page.');
        header('Location: ' . url('login'));
        exit;
    }

    if (!is_admin()) {
        set_flash('error', 'Admin access required.');
        header('Location: ' . url('login'));
        exit;
    }

    return true;
};
