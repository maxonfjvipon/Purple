<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\Endpoint;
use Maxonfjvipon\Purple\Support\Traits\HandlePrefixes;

/**
 * Route by URI.
 */
final class RtUri extends RtWrap
{
    use HandlePrefixes;

    /**
     * Ctor.
     *
     * @param string $uri
     * @param Endpoint $endpoint
     */
    public function __construct(string $uri, Endpoint $endpoint)
    {
        parent::__construct(
            $this->routeWithPrefix($uri, $endpoint, final: true)
        );
    }
}
