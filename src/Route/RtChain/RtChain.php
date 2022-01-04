<?php


namespace Purple\Route\RtChain;

use Exception;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;

class RtChain implements Route
{
    private array $routes;

    public function __construct(Route ...$rts)
    {
        $this->routes = $rts;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function send(Request $req): Response
    {
        $current = null;
        foreach ($this->routes as $route) {
            $current = $route->send($req);
        }
        return $current;
    }
}