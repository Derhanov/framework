<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

header('Content-Type: text/html; charset=utf-8');

$request = Request::createFromGlobals();
$name = $request->get('name', 'world');
$response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
$response->prepare($request);
$response->send();

$path = $request->getPathInfo();
echo "Path = '$path'";


// retrieve GET and POST variables respectively
$test1 = $request->query->get('foo', 'Work');

$test = $request->request->get('bar', 'default value if bar does not exist');
$response = new Response(sprintf('Hello! %s', htmlspecialchars($test1, ENT_QUOTES, 'UTF-8') . "\n"));

$response->send();


// retrieve SERVER variables
$host = $request->server->get('HTTP_HOST');
//$response = new Response(gethostbyname('localhost'));
$response = new Response(gethostbyname('google.com'));
//$response = new Response(sprintf('Host ', htmlspecialchars($host, ENT_QUOTES, 'UTF-8')));
$response->send();


// retrieve a COOKIE value
$request->cookies->get('PHPSESSID');

// retrieve an HTTP request header, with normalized, lowercase keys
$hosts = $request->headers->get('host');
$response = new Response( $hosts );
$response->prepare($request);
$response->send();

$request->getMethod();    // GET, POST, PUT, DELETE, HEAD
$response = new Response( $request->getMethod());
$response->prepare($request);
$response->send();

$request->getLanguages(); // an array of languages the client accepts
//var_dump($request->getLanguages());
$response = new Response(implode(",", $request->getLanguages()));
$response->prepare($request);
$response->send();

$request = Request::create('/index.php?name=Derhan');

$response = new Response();

$response->setContent('Hello Derhan');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');

$content = $request->getContent();
print 'This is get content ' . $content;

$response->prepare($request);
$response->send();

$request = Request::createFromGlobals();
$myIp = $request->getClientIp();
print 'This is my ip ' . $myIp;


$request->query->get('foo', "foo");
$request->query->set('foo', "newValFoo");

print 'Foo = ' . $request->get('foo');





























