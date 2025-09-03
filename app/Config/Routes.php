<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');

$routes->group('api', function($routes) {
    $routes->post('login', 'Api\Auth::login');
    $routes->get('profile', 'Api\Auth::profile'); // protected
});

