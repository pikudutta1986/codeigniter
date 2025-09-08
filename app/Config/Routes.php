<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// front website
$routes->get('/', 'PageController::home');
$routes->get('products', 'PageController::products');
$routes->get('contact', 'PageController::contact');
$routes->get('login', 'PageController::login');
$routes->get('cart', 'PageController::cart');
$routes->get('checkout', 'PageController::checkout');

// admin
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('products', 'Admin\Products::index');
    $routes->get('orders', 'Admin\Orders::index');
    $routes->get('login', 'Admin\Auth::login', ['filter' => 'noauth']);
    $routes->post('login', 'Admin\Auth::attemptLogin');
    $routes->get('logout', 'Admin\Auth::logout');
});

// api
$routes->group('api', function($routes) {
    // auth
    $routes->post('login', 'Api\Auth::login');
    $routes->get('profile', 'Api\Auth::profile');

    // Users
    $routes->get('users', 'Api\UserController::index');
    $routes->get('users/(:num)', 'Api\UserController::show/$1');
    $routes->post('users', 'Api\UserController::create');
    $routes->put('users/(:num)', 'Api\UserController::update/$1');
    $routes->delete('users/(:num)', 'Api\UserController::delete/$1');

    // Products
    $routes->get('products', 'Api\ProductController::index');
    $routes->get('products/(:num)', 'Api\ProductController::show/$1');
    $routes->post('products', 'Api\ProductController::create');
    $routes->put('products/(:num)', 'Api\ProductController::update/$1');
    $routes->delete('products/(:num)', 'Api\ProductController::delete/$1');
});

