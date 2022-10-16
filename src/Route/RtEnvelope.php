<?php

namespace Purple\Route;

use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Route envelope.
 */
class RtEnvelope implements Route
{
    /**
     * @var Route $origin
     */
    private Route $origin;

    /**
     * Ctor.
     *
     * @param Route $origin
     */
    public function __construct(Route $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     */
    public function destination(Request $request): OptionalEndpoint
    {
        return $this->origin->destination($request);
    }
}
