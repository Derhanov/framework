<?php
use Symfony\Component\Routing;
use App\LeapYearController;
require_once __DIR__ . '/../vendor/autoload.php';

function is_leap_year($year = null) {
	if (null === $year) {
		$year = date('Y');
	}

	return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
	'year' => null,
	'_controller' => array(new LeapYearController(), 'index'),
)));

return $routes;