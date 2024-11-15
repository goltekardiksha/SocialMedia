<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'FeedController::index');
$routes->get('/feed', 'FeedController::feed');
$routes->get('/post/(:num)', 'FeedController::view/$1');
$routes->post('/getfeed', 'FeedController::getPosts');

