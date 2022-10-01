<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Route with prefix.
 */
final class RtPrefix implements Route
{
    /**
     * @var string $prefix
     */
    private string $prefix;

    /**
     * @var Route|Endpoint $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string $prefix
     * @param $origin
     */
    public function __construct(string $prefix, $origin)
    {
        $this->prefix = $prefix;
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function destination(Request $request): OptionalEndpoint
    {

    }
}
