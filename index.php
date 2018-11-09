<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//header('Content-Type: text/html; charset=utf-8');
$request = Request::createFromGlobals();
$name = $request->get('name', 'world');
$response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
$response->prepare($request);
$response->send();
