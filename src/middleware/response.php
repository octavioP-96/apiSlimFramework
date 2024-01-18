<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

return function (Request $request, Response $response, $next) {
    $response = $next($request, $response);
    return $response->withHeader('Content-Type', 'application/json');
};