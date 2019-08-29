<?php

use Phplite\Router\Route;

// Guest user routes
Route::middleware('GuestUser', function () {
    // Login page
    Route::get('/login', 'Web\AuthController@showLoginForm');
    Route::post('/login', 'Web\AuthController@login');

    // Register page
    Route::get('/register', 'Web\AuthController@showRegisterForm');
    Route::post('/register', 'Web\AuthController@register');
});

// Auth user routes
Route::middleware('AuthAdmin', function () {
    // My links page
    Route::get('/my-links', 'Web\LinksController@mylinks');

    // link delete
    Route::post('/link/{id}/delete', 'Web\LinksController@delete');

    // Logout page
    Route::post('/logout', 'Web\AuthController@logout');
});

// Home page
Route::get('/', 'Web\HomeController@index');

// save link
Route::post('/link/store', 'Web\LinksController@store');

// Link page
Route::get('link/{link}', 'Web\LinksController@link');