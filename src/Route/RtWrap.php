<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\OptionalEndpoint;
use Maxonfjvipon\Purple\Request\Request;

/**
 * Route envelope.
 */
class RtWrap implements Route
{
    /**
     * Ctor.
     * @param Route $origin
     */
    public function __construct(private Route $origin)
    {
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
