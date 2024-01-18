<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Middleware\LoggerMiddleware;

require '../vendor/autoload.php'; // cosas de composer
require 'config.php'; // configuraciones de la bd

$config['displayErrorDetails'] = true; // $config = Configuraciones de Slim
$config['addContentLengthHeader'] = false;
$config['db']['host']   = $HOST;
$config['db']['user']   = $USER;
$config['db']['pass']   = $PASS;
$config['db']['dbname'] = $DBNAME;
$app = new \Slim\App(['settings' => $config]); // crear la aplicacion

// CONFIGURAR DEPENDENCIAS
$container = $app->getContainer(); // obtener el contenedor de dependencias
require '../src/dependencies/dependencies.php'; // configurar dependencias bd, logger

// Add middleware
$app->add(require __DIR__ . '/../src/middleware/response.php'); // middleware para configurar el las respuestas tipo json
$app->add(new LoggerMiddleware($container->get('logger'))); // middleware para loggear las peticiones

// incluir rutas
require '../src/routes/apiRoutes.php';


$app->run();
