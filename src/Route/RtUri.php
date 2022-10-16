<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;
use Purple\Support\Traits\HandlePrefixes;

/**
 * Route by URI.
 */
final class RtUri extends RtEnvelope
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
            self::routeWithPrefix($uri, $endpoint, true)
        );
    }
}
