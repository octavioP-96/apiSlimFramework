<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Controllers\UserController;

$container['UserController'] = function($container) {
    return new UserController($container);
};

$app->get('/users', 'UserController:getUsers');
$app->get('/users/{name}', 'UserController:index');
$app->post('/user/create', 'UserController:createUser');
$app->get('/user/{id}', 'UserController:getUser');