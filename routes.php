<?php 
/**
 * All routes here
 * LavaLite Routing System
 */

// ==================== Authentication Routes ====================
// Guest routes (accessible only when not logged in)
$router->get('/', 'app/views/login-handler')->middleware('guest');
$router->get('/login', 'app/views/login-handler')->middleware('guest');
$router->post('/login', 'app/views/login-handler')->middleware('guest');
$router->get('/register', 'app/views/register')->middleware('guest');
$router->post('/register', 'app/views/register')->middleware('guest');

// Logout route (requires authentication)
$router->post('/logout', 'app/views/logout')->middleware('auth');
$router->get('/logout', 'app/views/logout')->middleware('auth');

// ==================== Admin Routes ====================
// Admin-only dashboard
$router->get('/dashboard', 'app/views/dashboard')->middleware('admin');

// ==================== User Routes ====================
// User-only dashboard 
$router->get('/user-dashboard', 'app/views/user-dashboard')->middleware('auth');

// User profile editing (users can edit their own profile)
$router->get('/profile/edit', 'app/views/edit')->middleware('auth');
$router->post('/profile/edit', 'app/views/edit')->middleware('auth');

// ==================== User Management Routes ====================
// Requires admin authentication
$router->get('/users', 'app/views/index')->middleware('admin');
$router->get('/users/create', 'app/views/create')->middleware('admin');
$router->post('/users/create', 'app/views/create')->middleware('admin');
$router->get('/users/{id}/edit', 'app/views/edit')->middleware('admin');
$router->post('/users/{id}/edit', 'app/views/edit')->middleware('admin');
$router->post('/users/{id}/delete', 'app/views/delete')->middleware('admin');
