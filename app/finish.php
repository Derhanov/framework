<?php

use Factory\ResultTable;
use Service\SortArray;
use User\User;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../data/database.php';


$users     = [];
$finalData = [];
foreach ( $database as $dataUser ) {
	$user          = new User();
	$user->id      = $dataUser['id'];
	$user->class   = $dataUser['class'];
	$user->name    = $dataUser['name'];
	$user->vehicle = $dataUser['vehicle'];
	$users[]       = $user;
}

$resultTable = new ResultTable();

foreach ( $users as $userData ) {
	$lap     = $resultTable->randomTimeLap();
	$penalty = $resultTable->randomTimePenalty();
	$win     = $resultTable->winner( $lap, $penalty );
	$userData->id;
	$userData->class;
	$userData->name;
	$userData->timeLap  = $lap;
	$userData->timeFail = $penalty;
	$userData->timeLap  = $lap;
	$userData->timeFail = $penalty;
	$userData->vehicle;
	$userData->winner = $win;

	$finalData[] = $userData;
}

$sortData        = new SortArray();
$sortResultTable = $sortData->multiSortArr( $finalData, 'class', 'winner' );

$loader = new Twig_Loader_Filesystem( __DIR__ . '/../templates' );
$twig   = new Twig_Environment( $loader, array(//	'cache' => '__DIR__./../cache',
) );

try {
	echo $twig->render( 'finish.html.twig', [
		'data' => $sortResultTable
	] );
} catch ( Twig_Error_Loader $e ) {
} catch ( Twig_Error_Runtime $e ) {
} catch ( Twig_Error_Syntax $e ) {
}

