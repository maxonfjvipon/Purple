<?php

namespace Purple\Route;

use Purple\Support\Traits\HandlePrefixes;

/**
 * Route with prefix.
 */
final class RtPrefix extends RtEnvelope
{
    use HandlePrefixes;

    /**
     * Ctor.
     *
     * @param string $prefix
     * @param Route $route
     */
    public function __construct(string $prefix, Route $route)
    {
        parent::__construct(
            self::routeWithPrefix($prefix, $route, false)
        );
    }
}
