<?php
//require_once __DIR__ . '/../../vendor/autoload.php';
//require_once __DIR__ . '/../../web/front.php';
//
//header('Content-Type: text/html; charset=utf-8');

$name = $request->get('name', 'World') ?>
Hello <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>




