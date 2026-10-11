<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Recipes::index');

$routes->get('recipes', 'Recipes::index');

$routes->get('recipes/create', 'Recipes::create');

$routes->post('recipes/store', 'Recipes::store');

$routes->get('recipes/edit/(:num)', 'Recipes::edit/$1');

$routes->post('recipes/update/(:num)', 'Recipes::update/$1');

$routes->post('recipes/delete/(:num)', 'Recipes::delete/$1');

$routes->get('recipes/show/(:num)', 'Recipes::show/$1');