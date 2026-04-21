<?php
/**
 * Authentication Middleware
 * Ensures user is logged in before accessing protected routes
 */
return function($method, $params) {
    if (!is_logged_in()) {
        set_flash('error', 'Please login to access this page.');
        header('Location: ' . url('login'));
        exit;
    }
    return true;
};
