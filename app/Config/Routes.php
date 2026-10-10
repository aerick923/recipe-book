<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Recipes::index');

$routes->get('recipes', 'Recipes::index');

$routes->get('recipes/create', 'Recipes::create');

$routes->post('recipes/store', 'Recipes::store');

$routes->get('recipes/edit/(:num)', 'Recipes:;edit/$1');