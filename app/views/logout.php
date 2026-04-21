<?php
/**
 * Logout Handler
 * Destroys session and redirects to login page
 */

logout_user();
set_flash('success', 'You have been logged out successfully.');
header('Location: ' . url('login'));
exit;
