<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing;
use Symfony\Component\Routing\Route;
//use Calendar\Controller\LeapYearController;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Route('/is_leap_year/{year}', array(
	'year' => null,
	'_controller' => 'Calendar\Controller\LeapYearController::index',
)));
return $routes;