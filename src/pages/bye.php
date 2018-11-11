<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../web/front.php';

$response->setContent ('Goodbye user');
$bye = $response->getContent();?>
<?= htmlspecialchars($bye, ENT_QUOTES, 'UTF-8') ?>
