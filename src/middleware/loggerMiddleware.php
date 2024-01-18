<?php
namespace App\Middleware;

class LoggerMiddleware
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function __invoke($request, $response, $next)
    {
        $reqUrl = $request->getUri()->getPath();
        $params = $request->getParsedBody() ?? [];
        $this->logger->info($request->getMethod() . ' ' . $reqUrl, $params);
        $response = $next($request, $response);
        return $response;
    }
}