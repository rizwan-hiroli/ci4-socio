<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('posts/view/(:num)', 'Posts::view/$1');
$routes->get('posts/add', 'Posts::add');
$routes->get('posts/edit/(:num)', 'Posts::edit/$1');
$routes->get('posts/delete/(:num)', 'Posts::delete/$1');
$routes->get('posts', 'Posts::index');

/* CRUD Route definitions */
$routes->get('employee', 'Employee::index', ['filter' => 'auth']);
$routes->get('employee/add', 'Employee::add');
$routes->post('employee/save', 'Employee::save');
$routes->get('employee/edit/(:num)', 'Employee::edit/$1');
$routes->post('employee/update', 'Employee::update');
$routes->get('employee/delete/(:num)', 'Employee::delete/$1');

//Authentication rotes.
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
