<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('index', new Routing\Route('/'));
$routes->add('bye', new Routing\Route('/bye/{name}' , array('name' => 'User')));

return $routes;