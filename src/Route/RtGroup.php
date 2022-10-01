<?php

namespace Purple\Route;

use Exception;
use Purple\Endpoint\EpOptEmpty;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Routes.
 */
final class RtGroup implements Route
{
    /**
     * @var array<Route> $routes
     */
    private array $routes;

    /**
     * Ctor.
     *
     * @param Route ...$routes
     */
    public function __construct(Route ...$routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        $destination = new EpOptEmpty();

        /** @var Route $route */
        foreach ($this->routes as $route) {
            $target = $route->destination($request);

            if ($target->has()) {
                $destination = $target;
                break;
            }
        }

        return $destination;
    }
}
