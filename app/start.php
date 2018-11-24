<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../data/database.php';

use Service\SortArray;
use User\User;

//вынести в класс
$users = [];
foreach ( $database as $dataUser ) {
	$user          = new User();
	$user->id      = $dataUser['id'];
	$user->class   = $dataUser['class'];
	$user->name    = $dataUser['name'];
	$user->vehicle = $dataUser['vehicle'];
	$users[]       = $user;
}

$sortUsers     = new SortArray();
$sortTableData = $sortUsers->multiSortArr( $users, 'class','name' );

$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader, array(
//	'cache' => '__DIR__./../cache',
));

try {
	echo $twig->render( 'start.html.twig', [
		'data' => $sortTableData
	] );
} catch ( Twig_Error_Loader $e ) {
} catch ( Twig_Error_Runtime $e ) {
} catch ( Twig_Error_Syntax $e ) {
}

