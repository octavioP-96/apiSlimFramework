<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';
$logger = new \Monolog\Logger('my_logger');
// set timezone mexico city
$file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
$logger->pushHandler($file_handler);
$logger->setTimezone(new \DateTimeZone('America/Mexico_City'));
return $logger;