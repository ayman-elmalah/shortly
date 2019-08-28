<?php

use Phplite\Router\Route;

// Guest user routes
Route::middleware('GuestUser', function () {
    // Login page
    Route::get('/', 'Web\AuthController@index');
    Route::post('/login', 'Web\AuthController@login');

    // Register page
    Route::get('/register', 'Web\AuthController@showRegisterForm');
    Route::post('/register', 'Web\AuthController@register');
});

// Auth user routes
Route::middleware('AuthAdmin', function () {
    // Dashboard page
    Route::get('/my-links', 'Web\LinksController@mylinks');

    // links routes
    Route::post('/link/store', 'Web\LinksController@store');
    Route::post('/link/{id}/delete', 'Web\LinksController@delete');

    // Logout page
    Route::post('/logout', 'Web\AuthController@logout');
});

// Link page
Route::get('link/{link}', 'Web\LinksController@link');