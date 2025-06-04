<?php

namespace Config;

use App\Controllers\Guests;

$routes->get('guests', 'Guests::index');
$routes->get('guests/create', 'Guests::create');
$routes->post('guests/store', 'Guests::store');
$routes->get('guests/edit/(:num)', 'Guests::edit/$1');
$routes->post('guests/update/(:num)', 'Guests::update/$1');
$routes->get('guests/delete/(:num)', 'Guests::delete/$1');

$routes->get('rooms', 'Rooms::index');
$routes->get('rooms/create', 'Rooms::create');
$routes->post('rooms/store', 'Rooms::store');
$routes->get('rooms/edit/(:num)', 'Rooms::edit/$1');
$routes->post('rooms/update/(:num)', 'Rooms::update/$1');
$routes->get('rooms/delete/(:num)', 'Rooms::delete/$1');

$routes->get('bookings', 'Bookings::index');
$routes->get('bookings/create', 'Bookings::create');
$routes->post('bookings/store', 'Bookings::store');
$routes->get('bookings/edit/(:num)', 'Bookings::edit/$1');
$routes->post('bookings/update/(:num)', 'Bookings::update/$1');
$routes->get('bookings/delete/(:num)', 'Bookings::delete/$1');

$routes->get('payments', 'Payments::index');
$routes->get('payments/create', 'Payments::create');
$routes->post('payments/store', 'Payments::store');
$routes->get('payments/edit/(:num)', 'Payments::edit/$1');
$routes->post('payments/update/(:num)', 'Payments::update/$1');
$routes->get('payments/delete/(:num)', 'Payments::delete/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/logout', 'AdminController::logout');




