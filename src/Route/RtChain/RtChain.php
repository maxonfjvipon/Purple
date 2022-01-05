<?php


namespace Purple\Route\RtChain;

use Exception;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;

/**
 * Chain route
 * @package Purple\Route\RtChain
 */
class RtChain implements Route
{
    /**
     * @var Route[] routes
     */
    private array $routes;

    /**
     * Ctor.
     * @param Route ...$rts
     */
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