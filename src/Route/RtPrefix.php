<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Support\Traits\HandlePrefixes;

/**
 * Route with prefix.
 */
final class RtPrefix extends RtWrap
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
            $this->routeWithPrefix($prefix, $route, final: false)
        );
    }
}
